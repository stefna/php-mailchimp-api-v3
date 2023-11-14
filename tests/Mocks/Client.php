<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Mocks;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Client extends \Stefna\Mailchimp\Client
{
	public function response(ResponseInterface $response): ?array
	{
		$this->saveResponse($response);
		return parent::response($response);
	}

	public function noOutputResponse(ResponseInterface $response): bool
	{
		$this->saveResponse($response);
		return parent::noOutputResponse($response);
	}

	protected function sendRequest(RequestInterface $request): ResponseInterface
	{
		if ($response = $this->mockResponse($request)) {
			return $response;
		}
		return parent::sendRequest($request);
	}

	protected function getResponseDir(): string
	{
		return __DIR__ . '/responses/';
	}

	protected function mockResponse(RequestInterface $request)
	{
		$file = $this->getResponseFilename($request);
		if (!is_file($file)) {
			return false;
		}
		$this->logger?->debug("Reading response from $file");
		return include $file;
	}

	protected function getResponseFilename(RequestInterface $request): string
	{
		$method = strtolower($request->getMethod());
		$url = (string)$request->getUri();
		$q = parse_url($url, PHP_URL_QUERY);
		$queryParams = '';
		if ($q) {
			$queryParams = "?$q";
			$url = substr($url, 0, -1 * strlen($queryParams));
		}
		$key = str_replace($this->apiEndpoint, '', $url);
		$key = trim($key, '/');
		return $this->getResponseDir() . $key . '/' . $method . $queryParams . '.php';
	}

	private function saveResponse(ResponseInterface $response): void
	{
		if ($this->lastRequest) {
			$file = $this->getResponseFilename($this->lastRequest);
			if (!is_file($file)) {
				$this->writeResponse($file, $response);
			}
		}
	}

	private function writeResponse(string $file, ResponseInterface $response): void
	{
		$body = $response->getBody();
		$body->rewind();
		$content = preg_replace("@'@", "\\'", $body->getContents());
		$data = "<?php\n\nreturn new \\GuzzleHttp\\Psr7\\Response(\n\t200,\n\t['IsMock' => true],\n\t'$content'\n);\n";
		$dir = dirname($file);
		if (!is_dir($dir)) {
			mkdir($dir, 0777, true);
		}
		file_put_contents($file, $data);
		$this->logger?->debug("Writing response to $file");
		$body->rewind();
	}
}
