<?php
declare(strict_types=1);

namespace Stefna\Mailchimp;

use Http\Client\HttpClient;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Message\MessageFactory;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Stefna\Mailchimp\Api\Campaigns\Campaigns as CampaignsApi;
use Stefna\Mailchimp\Api\Lists\Lists as ListsApi;
use Stefna\Mailchimp\Api\Templates\Templates;
use function GuzzleHttp\Psr7\str;

class Client
{
	const DEFAULT_ENDPOINT = 'https://<dc>.api.mailchimp.com/3.0';
	protected ?LoggerInterface $logger = null;
	protected ?ResponseInterface $lastResponse;
	protected ?RequestInterface $lastRequest;
	protected MessageFactory $messageFactory;
	protected HttpClient $httpClient;
	protected string $apiKey;
	protected string $apiEndpoint = '';

	/**
	 * Client constructor.
	 * @param HttpClient $httpClient
	 * @param string $apiKey
	 * @param string|null $apiEndpoint
	 * @param MessageFactory|null $messageFactory
	 */
	public function __construct(
		HttpClient      $httpClient,
		string          $apiKey,
		?string         $apiEndpoint = null,
		?MessageFactory $messageFactory = null
	) {
		$this->httpClient = $httpClient;
		$this->apiKey = $apiKey;
		$this->apiEndpoint = $apiEndpoint ?: $this->createApiEndpoint($apiKey);
		$this->messageFactory = $messageFactory ?: MessageFactoryDiscovery::find();
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

	public function getHttpClient(): HttpClient
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
		return $this->request($this->messageFactory->createRequest(
			'get',
			$this->createUrl($path, $args),
			$this->getDefaultHeaders()
		));
	}

	/**
	 * @param string $path
	 * @param array<string, string> $args
	 * @return bool
	 */
	public function delete(string $path, array $args = []): bool
	{
		return (bool)$this->request($this->messageFactory->createRequest(
			'delete',
			$this->createUrl($path, $args),
			$this->getDefaultHeaders()
		), true);
	}

	/**
	 * @param string $path
	 * @param array<string, mixed> $data
	 * @return array<string, mixed>
	 */
	public function post(string $path, array $data = []): array
	{
		/** @var array<string, mixed> */
		return $this->request($this->messageFactory->createRequest(
			'post',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			(string)json_encode($data)
		));
	}

	/**
	 * @param string $path
	 * @param array<string, mixed> $data
	 * @return array<string, mixed>
	 */
	public function put(string $path, array $data = []): array
	{
		/** @var array<string, mixed> */
		return $this->request($this->messageFactory->createRequest(
			'put',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			(string)json_encode($data)
		));
	}

	/**
	 * @param string $path
	 * @param array<string, mixed> $data
	 * @return mixed
	 * @noinspection PhpReturnDocTypeMismatchInspection
	 */
	public function patch(string $path, array $data = [])
	{
		return $this->request($this->messageFactory->createRequest(
			'patch',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			(string)json_encode($data)
		));
	}

	/**
	 * @param RequestInterface $request
	 * @param bool $noOutput
	 * @return bool|string|string[]|null
	 */
	public function request(RequestInterface $request, bool $noOutput = false)
	{
		$this->lastRequest = $request;

		if ($this->logger) {
			$this->logger->debug('Request created', [
				'request' => str($request),
			]);
		}

		return !$noOutput
			? $this->response($this->sendRequest($request))
			: $this->noOutputResponse($this->sendRequest($request));
	}

	public function noOutputResponse(ResponseInterface $response): bool
	{
		$this->lastResponse = $response;
		$status = $response->getStatusCode();

		if ($this->logger) {
			$this->logger->debug('Response created without output', [
				'headers' => json_encode($response->getHeaders()),
				'status' => $status,
			]);
		}


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
	 * @param ResponseInterface $response
	 * @return string|string[]|null
	 */
	public function response(ResponseInterface $response)
	{
		$this->lastResponse = $response;
		$contents = $response->getBody()->getContents();
		/** @var array<string, string>|null $ret */
		$ret = json_decode($contents, true);
		$jsonLastError = json_last_error();
		$jsonOk = JSON_ERROR_NONE === $jsonLastError;
		$status = $response->getStatusCode();
		if ($jsonOk && $ret && isset($ret['status']) && is_numeric($ret['status'])) {
			$status = (int)$ret['status'];
		}
		if ($this->logger) {
			$this->logger->debug('Response created', [
				'headers' => json_encode($response->getHeaders()),
				'body' => $jsonOk ? $ret : $contents,
				'jsonLastError' => $jsonLastError,
				'status' => $status,
			]);
		}

		if ($status > 299 && is_array($ret)) {
			$errorMsg = $this->formatError($ret);
			if ($this->logger) {
				$this->logger->alert($errorMsg);
			}

			if ($status !== 404) {
				$msg = 'Error from API';
				if ($errorMsg && $errorMsg[0] !== '{') {
					$msg .= ": $errorMsg";
				}
				throw new RuntimeException($msg, $status);
			}
			return null;
		}
		if (!$jsonOk) {
			return $contents;
		}
		return $ret;
	}

	/**
	 * @return string[]
	 */
	public function getDefaultHeaders(): array
	{
		return [
			'Accept' => 'application/vnd.api+json',
			'Content-Type' => 'application/vnd.api+json',
			'Authorization' => 'apikey ' . $this->apiKey,
		];
	}

	protected function createApiEndpoint(string $apiKey): string
	{
		if (strpos($apiKey, '-') === false) {
			throw new InvalidArgumentException("Invalid api key: $apiKey");
		}
		[, $dc] = explode('-', $apiKey);
		return (string)str_replace('<dc>', (string)$dc, self::DEFAULT_ENDPOINT);
	}

	protected function sendRequest(RequestInterface $request): ResponseInterface
	{
		/** @noinspection PhpUnhandledExceptionInspection */
		return $this->httpClient->sendRequest($request);
	}

	/**
	 * @param string|array<string,string>|array<string,array<string,string>> $data
	 * @return string
	 */
	protected function formatError($data): string
	{
		if (is_string($data)) {
			return $data;
		}
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
	 * @param string $path
	 * @param array<string,string> $queryParams
	 * @return string
	 */
	protected function createUrl(string $path, array $queryParams = []): string
	{
		$ret = $this->apiEndpoint . '/' . $path;
		if ($queryParams) {
			$ret .= '?' . http_build_query($queryParams);
		}
		return $ret;
	}
}
