<?php declare(strict_types=1);

namespace Stefna\Mailchimp;

use InvalidArgumentException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Stefna\Mailchimp\Api\Campaigns\Campaigns as CampaignsApi;
use Stefna\Mailchimp\Api\Lists\Lists as ListsApi;
use Stefna\Mailchimp\Api\Templates\Templates;
use Stefna\Mailchimp\Exceptions\NotFoundException;

class Client
{
	private const DEFAULT_ENDPOINT = 'https://<dc>.api.mailchimp.com/3.0';

	protected ?LoggerInterface $logger = null;
	protected ?ResponseInterface $lastResponse = null;
	protected ?RequestInterface $lastRequest = null;
	protected string $apiEndpoint = '';

	public function __construct(
		protected ClientInterface $httpClient,
		protected string $apiKey,
		protected RequestFactoryInterface $requestFactory,
		protected UriFactoryInterface $uriFactory,
		protected StreamFactoryInterface $streamFactory,
		?string $apiEndpoint = null,
	) {
		$this->apiEndpoint = $apiEndpoint ?: $this->createApiEndpoint($apiKey);
	}

	public function lists(): ListsApi
	{
		return new ListsApi($this);
	}

	public function campaigns(): CampaignsApi
	{
		return new CampaignsApi($this);
	}

	public function templates(): Templates
	{
		return new Templates($this);
	}

	public function getLogger(): ?LoggerInterface
	{
		return $this->logger;
	}

	public function setLogger(LoggerInterface $logger): void
	{
		$this->logger = $logger;
	}

	public function getHttpClient(): ClientInterface
	{
		return $this->httpClient;
	}

	/**
	 * @param array<string,string> $args
	 * @return array<string, mixed>
	 */
	public function get(string $path, array $args = []): array
	{
		/** @var array<string, mixed> */
		return $this->request($this->createRequest(
			'GET',
			$this->createUrl($path, $args),
			$this->getDefaultHeaders(),
		)) ?? [];
	}

	/**
	 * @param array<string, string> $args
	 */
	public function delete(string $path, array $args = []): bool
	{
		return $this->request($this->createRequest(
			'DELETE',
			$this->createUrl($path, $args),
			$this->getDefaultHeaders(),
		), true);
	}

	/**
	 * @param array<string, mixed> $data
	 * @return array<string, mixed>|null
	 */
	public function post(string $path, array $data = []): array|null
	{
		/** @var array<string, mixed> */
		return $this->request($this->createRequest(
			'POST',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			(string)json_encode($data),
		));
	}

	/**
	 * @param array<string, mixed> $data
	 * @return array<string, mixed>
	 */
	public function put(string $path, array $data = []): array
	{
		$ret = $this->request($this->createRequest(
			'PUT',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			(string)json_encode($data),
		));
		if ($ret === null) {
			throw new NotFoundException('Put item not found: ' . $path);
		}
		/** @var array<string, mixed> */
		return $ret;
	}

	/**
	 * @param array<string, mixed> $data
	 * @return array<string, mixed>
	 */
	public function patch(string $path, array $data = []): array
	{
		$ret = $this->request($this->createRequest(
			'PATCH',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			(string)json_encode($data),
		));
		if ($ret === null) {
			throw new NotFoundException('Patch item not found: ' . $path);
		}
		return $ret;
	}

	/**
	 * @phpstan-return ($noOutput is true ? bool : array<string, mixed>|null)
	 * @return bool|array<string, mixed>|null
	 */
	public function request(RequestInterface $request, bool $noOutput = false): bool|array|null
	{
		$this->lastRequest = $request;

		$this->logger?->debug('Request created', [
			'method' => $request->getMethod(),
			'target' => $request->getRequestTarget(),
			'protocol_version' => $request->getProtocolVersion(),
			'host' => $request->hasHeader('host') ? $request->getUri()->getHost() : null,
		]);

		return !$noOutput
			? $this->response($this->sendRequest($request))
			: $this->noOutputResponse($this->sendRequest($request));
	}

	public function noOutputResponse(ResponseInterface $response): bool
	{
		$this->lastResponse = $response;
		$status = $response->getStatusCode();

		$this->logger?->debug('Response created without output', [
			'headers' => json_encode($response->getHeaders()),
			'status' => $status,
		]);

		if ($status > 299) {
			if ($status != 404) {
				$contents = $response->getBody()->getContents();
				$ret = json_decode($contents, true);
				if ($ret && is_array($ret) && $this->logger) {
					$this->logger->alert($this->formatError($ret));
				}
			}
			return false;
		}
		return true;
	}

	/**
	 * @return array<string, mixed>|null
	 */
	public function response(ResponseInterface $response): ?array
	{
		$this->lastResponse = $response;
		$contents = $response->getBody()->getContents();
		$status = $response->getStatusCode();

		if ($contents === '' && $status >= 200 && $status < 300) {
			return [];
		}

		/** @var array<string, mixed>|null $ret */
		$ret = json_decode($contents, true);
		$jsonLastError = json_last_error();
		$jsonOk = JSON_ERROR_NONE === $jsonLastError;
		if ($jsonOk && $ret && isset($ret['status']) && is_numeric($ret['status'])) {
			$status = (int)$ret['status'];
		}

		$this->logger?->debug('Response created', [
			'headers' => json_encode($response->getHeaders()),
			'body' => $jsonOk ? $ret : $contents,
			'jsonLastError' => $jsonLastError,
			'status' => $status,
		]);

		if ($status === 404) {
			return null;
		}

		if ($status > 299 && is_array($ret)) {
			$errorMsg = $this->formatError($ret);
			$this->logger?->alert($errorMsg);

			$msg = 'Error from API';
			if ($errorMsg && $errorMsg[0] !== '{') {
				$msg .= ": $errorMsg";
			}
			throw new RuntimeException($msg, $status);
		}
		if (!$jsonOk || !is_array($ret)) {
			$this->logger?->warning('Could not decode json response', [
				'headers' => json_encode($response->getHeaders()),
				'body' => $contents,
				'jsonLastError' => $jsonLastError,
				'status' => $status,
			]);
			throw new RuntimeException('Could not decode json response');
		}
		return $ret;
	}

	/**
	 * @return array<string, string>
	 */
	public function getDefaultHeaders(): array
	{
		return [
			'Accept' => 'application/vnd.api+json',
			'Content-Type' => 'application/vnd.api+json',
			'Authorization' => 'apikey ' . $this->apiKey,
		];
	}

	public function getLastResponse(): ?ResponseInterface
	{
		return $this->lastResponse;
	}

	public function getLastRequest(): ?RequestInterface
	{
		return $this->lastRequest;
	}

	protected function createApiEndpoint(string $apiKey): string
	{
		if (!str_contains($apiKey, '-')) {
			throw new InvalidArgumentException("Invalid api key: $apiKey");
		}
		[, $dc] = explode('-', $apiKey);
		return (string)str_replace('<dc>', $dc, self::DEFAULT_ENDPOINT);
	}

	protected function sendRequest(RequestInterface $request): ResponseInterface
	{
		/** @noinspection PhpUnhandledExceptionInspection */
		return $this->httpClient->sendRequest($request);
	}

	/**
	 * @param array<string,mixed> $data
	 */
	protected function formatError(array $data): string
	{
		if (!isset($data['title'])) {
			return (string)json_encode($data);
		}
		$ret = is_string($data['title']) ? $data['title'] : '';
		if (isset($data['errors']) && is_array($data['errors'])) {
			$errors = [];
			/** @var array<string, string> $error */
			foreach ($data['errors'] as $error) {
				if (is_array($error) && isset($error['field'], $error['message'])) {
					$errors[] = "  {$error['field']}: {$error['message']}";
				}
			}
			$ret = "$ret\n" . implode("\n", $errors);
		}
		elseif (isset($data['detail']) && is_string($data['detail'])) {
			$ret = $data['detail'];
		}
		return $ret;
	}

	/**
	 * @param array<string,string> $queryParams
	 */
	protected function createUrl(string $path, array $queryParams = []): UriInterface
	{
		$url = $this->apiEndpoint . '/' . $path;
		if ($queryParams) {
			$url .= '?' . http_build_query($queryParams);
		}
		return $this->uriFactory->createUri($url);
	}

	/**
	 * @param array<string, string|string[]> $headers
	 */
	protected function createRequest(
		string $method,
		UriInterface $uri,
		array $headers = [],
		?string $body = null,
	): RequestInterface {
		$ret = $this->requestFactory->createRequest($method, $uri);
		foreach ($headers as $key => $value) {
			$ret = $ret->withHeader($key, $value);
		}
		if ($body) {
			$ret = $ret->withBody($this->streamFactory->createStream($body));
		}
		return $ret;
	}
}
