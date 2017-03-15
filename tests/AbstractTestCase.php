<?php

namespace Tests\Stefna\Mailchimp;

use Http\Client\Curl\Client as HttpClient;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Tests\Stefna\Mailchimp\Mocks\Client;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
	const ENV_API_KEY = 'MAILCHIMP_API_KEY';
	const ENV_LOG = 'MAILCHIMP_LOG';

	private static $httpClient;
	private static $apiKey;

	public static function setUpBeforeClass()
	{
		parent::setUpBeforeClass();

		self::$httpClient = new HttpClient();
		self::$apiKey = getenv(self::ENV_API_KEY) ?: 'test-test01';
	}
	/**
	 * @return Client
	 */
	protected function getClient()
	{
		$client = new Client(self::$httpClient, self::$apiKey);
		$client->setLogger($this->getLogger());
		return $client;
	}

	/**
	 * @return \Stefna\Mailchimp\Client
	 */
	protected function getRealClient()
	{
		$client = new \Stefna\Mailchimp\Client(self::$httpClient, self::$apiKey);
		$client->setLogger($this->getLogger());
		return $client;
	}

	protected function getLogger()
	{
		$fileName = getenv(self::ENV_LOG) ?: '/tmp/php-mailchimp-api-v3-test.log';
		return (new Logger('testLogger'))
			->pushHandler(new StreamHandler($fileName))
			->pushProcessor(new RemoveKeyProcessor('_links'))
		;
	}
}
