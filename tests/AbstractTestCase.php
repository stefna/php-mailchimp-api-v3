<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp;

use Http\Client\Curl\Client as HttpClient;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Tests\Stefna\Mailchimp\Mocks\Client;

abstract class AbstractTestCase extends TestCase
{
	private const ENV_API_KEY = 'MAILCHIMP_API_KEY';
	private const ENV_LOG = 'MAILCHIMP_LOG';

	private static HttpClient $httpClient;
	private static string $apiKey;

	public static function setUpBeforeClass(): void
	{
		parent::setUpBeforeClass();

		self::$httpClient = new HttpClient();
		self::$apiKey = getenv(self::ENV_API_KEY) ?: 'test-test01';
	}

	protected function getClient(): Client
	{
		$client = new Client(self::$httpClient, self::$apiKey);
		$client->setLogger($this->getLogger());
		return $client;
	}

	protected function getRealClient(): \Stefna\Mailchimp\Client
	{
		$client = new \Stefna\Mailchimp\Client(self::$httpClient, self::$apiKey);
		$client->setLogger($this->getLogger());
		return $client;
	}

	protected function getLogger(): Logger
	{
		$fileName = getenv(self::ENV_LOG) ?: '/tmp/php-mailchimp-api-v3-test.log';
		return (new Logger('testLogger'))
			->pushHandler(new StreamHandler($fileName))
			->pushProcessor(new RemoveKeyProcessor('_links'))
		;
	}
}
