<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp;

use Http\Client\Curl\Client as HttpClient;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Tests\Stefna\Mailchimp\Mocks\Client;

abstract class AbstractTestCase extends TestCase
{
	private const ENV_API_KEY = 'MAILCHIMP_API_KEY';
	private const ENV_LOG = 'MAILCHIMP_LOG';
	private static ClientInterface $httpClient;
	private static string $apiKey;

	public static function setUpBeforeClass(): void
	{
		parent::setUpBeforeClass();

		self::$httpClient = new HttpClient();
		self::$apiKey = getenv(self::ENV_API_KEY) ?: 'test-test01';
	}

	protected function getClient(): Client
	{
		$factory = new Psr17Factory();
		$client = new Client(
			httpClient: self::$httpClient,
			apiKey: self::$apiKey,
			requestFactory: $factory,
			uriFactory: $factory,
			streamFactory: $factory,
		);
		$client->setLogger($this->getLogger());
		return $client;
	}

	protected function getRealClient(): \Stefna\Mailchimp\Client
	{
		$factory = new Psr17Factory();
		$client = new \Stefna\Mailchimp\Client(
			self::$httpClient,
			self::$apiKey,
			$factory,
			$factory,
			$factory,
		);
		$client->setLogger($this->getLogger());
		return $client;
	}

	protected function getLogger(): Logger
	{
		$fileName = getenv(self::ENV_LOG) ?: '/tmp/php-mailchimp-api-v3-test.log';
		return (new Logger('testLogger'))
			->pushHandler(new StreamHandler($fileName))
			->pushProcessor(new RemoveKeyProcessor('_links'));
	}
}
