<?php

namespace Stefna\Mailchimp;

use Http\Client\HttpClient;
use Http\Discovery\MessageFactoryDiscovery;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Stefna\Mailchimp\Api\Campaigns\Campaigns as CampaignsApi;
use Stefna\Mailchimp\Api\Lists\Lists as ListsApi;
use Stefna\Mailchimp\Api\Templates\Templates;

class Client
{
	const DEFAULT_ENDPOINT = 'https://<dc>.api.mailchimp.com/3.0';
	const TIMEOUT = 10;
	/**
	 * @var LoggerInterface
	 */
	protected $logger;
	/** @var ResponseInterface */
	protected $lastResponse;
	protected $lastRequest;
	protected $messageFactory;
	/**
	 * @var HttpClient
	 */
	protected $httpClient;
	/**
	 * @var string
	 */
	protected $apiKey;
	protected $apiEndpoint = '';

	/**
	 * Client constructor.
	 * @param HttpClient $httpClient
	 * @param string $apiKey
	 * @param string|null $apiEndpoint
	 * @param MessageFactoryDiscovery|null $messageFactory
	 */
	public function __construct(HttpClient $httpClient, string $apiKey, ?string $apiEndpoint = null, $messageFactory = null)
	{
		$this->httpClient = $httpClient;
		$this->apiKey = $apiKey;
		$this->apiEndpoint = $apiEndpoint ?: $this->createApiEndpoint($apiKey);
		$this->messageFactory = $messageFactory ?: MessageFactoryDiscovery::find();
	}

	public function lists()
	{
		return new ListsApi($this);
	}

	public function campaigns()
	{
		return new CampaignsApi($this);
	}

	public function templates()
	{
		return new Templates($this);
	}

	/**
	 * @return LoggerInterface
	 */
	public function getLogger()
	{
		return $this->logger;
	}

	public function setLogger(LoggerInterface $logger)
	{
		$this->logger = $logger;
		return $this;
	}

	public function getHttpClient()
	{
		return $this->httpClient;
	}

	public function get($path, $args = [])
	{
		return $this->request($this->messageFactory->createRequest(
			'get',
			$this->createUrl($path, $args),
			$this->getDefaultHeaders()
		));
	}

	/**
	 * @param string $path
	 * @param array $args
	 * @return bool
	 */
	public function delete($path, $args = [])
	{
		return $this->request($this->messageFactory->createRequest(
			'delete',
			$this->createUrl($path, $args),
			$this->getDefaultHeaders()
		), true);
	}

	public function post($path, $data = [])
	{
		return $this->request($this->messageFactory->createRequest(
			'post',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			json_encode($data)
		));
	}

	public function put($path, $data = [])
	{
		return $this->request($this->messageFactory->createRequest(
			'put',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			json_encode($data)
		));
	}

	public function patch($path, $data = [])
	{
		return $this->request($this->messageFactory->createRequest(
			'patch',
			$this->createUrl($path),
			$this->getDefaultHeaders(),
			json_encode($data)
		));
	}

	public function request(RequestInterface $request, $noOutput = false)
	{
		$this->lastRequest = $request;

		$this->logger->debug("Request created", [
			'request' => \GuzzleHttp\Psr7\str($request),
		]);

		return (!$noOutput)
			? $this->response($this->sendRequest($request))
			: $this->noOutputResponse($this->sendRequest($request));
	}

	public function noOutputResponse(ResponseInterface $response)
	{
		$this->lastResponse = $response;
		$status = $response->getStatusCode();


		$this->logger->debug("Response created without output", [
			'headers' => json_encode($response->getHeaders()),
			'status' => $status,
		]);


		if ($status > 299) {
			if ($status != 404) {
				$contents = $response->getBody()->getContents();
				$ret = json_decode($contents, true);
				if ($ret) {
					$this->logger->alert($this->formatError($ret));
				}
			}
			return false;
		}
		return true;
	}

	public function response(ResponseInterface $response)
	{
		$this->lastResponse = $response;
		$contents = $response->getBody()->getContents();
		$ret = json_decode($contents, true);
		$jsonLastError = json_last_error();
		$jsonOk = JSON_ERROR_NONE === $jsonLastError;
		$status = $response->getStatusCode();
		if ($jsonOk && $ret && isset($ret['status'])) {
			$status = $ret['status'];
		}
		$this->logger->debug("Response created", [
			'headers' => json_encode($response->getHeaders()),
			'body' => $jsonOk ? $ret : $contents,
			'jsonLastError' => $jsonLastError,
			'status' => $status,
		]);

		if ($status > 299) {
			$errorMsg = $this->formatError($ret);
			$this->logger->alert($errorMsg);

			if ($status !== 404) {
				$msg = "Error from API";
				if ($errorMsg && $errorMsg[0] !== '{') {
					$msg .= ": $errorMsg";
				}
				throw new \RuntimeException($msg, $status);
			}
			return null;
		}
		if (!$jsonOk) {
			return $contents;
		}
		return $ret;
	}

	/**
	 * @return array
	 */
	public function getDefaultHeaders()
	{
		$headers = [
			'Accept' => 'application/vnd.api+json',
			'Content-Type' => 'application/vnd.api+json',
			'Authorization' => 'apikey ' . $this->apiKey,
		];
		return $headers;
	}

	protected function createApiEndpoint($apiKey)
	{
		if (strpos($apiKey, '-') === false) {
			throw new InvalidArgumentException("Invalid api key: $apiKey");
		}
		[, $dc] = explode('-', $apiKey);
		return str_replace('<dc>', $dc, self::DEFAULT_ENDPOINT);
	}

	protected function sendRequest(RequestInterface $request)
	{
		return $this->httpClient->sendRequest($request);
	}

	protected function formatError($data)
	{
		if (is_string($data)) {
			return $data;
		}
		if (!isset($data['title'])) {
			return json_encode($data);
		}
		$ret = $data['title'];
		if (isset($data['errors'])) {
			$errors = [];
			foreach ($data['errors'] as $error) {
				$errors[] = "  {$error['field']}: {$error['message']}";
			}
			$ret = "$ret\n" . implode("\n", $errors);
		}
		else if (isset($data['detail'])) {
			$ret = $data['detail'];
		}
		return $ret;
	}

	protected function createUrl($path, $queryParams = [])
	{
		$ret = $this->apiEndpoint . '/' . $path;
		if ($queryParams) {
			$ret .= '?' . http_build_query($queryParams);
		}
		return $ret;
	}
}
