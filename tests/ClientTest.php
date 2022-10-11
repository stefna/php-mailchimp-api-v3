<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp;

use Http\Client\Curl\Client as HttpClient;
use Stefna\Mailchimp\Api\Lists\Lists as ListsApi;
use Stefna\Mailchimp\Api\Lists\Members as ListsMembersApi;

class ClientTest extends AbstractTestCase
{
	public function testCanInstantiateClient(): void
	{
		$this->getClient();
	}

	public function testProvidesClientAccess(): void
	{
		$client = $this->getClient();
		$this->assertInstanceOf(HttpClient::class, $client->getHttpClient());
	}

	public function testProvidesBasicRequests(): void
	{
		$client = $this->getClient();
		$this->assertTrue(method_exists($client, 'get'), 'Missing get() method');
		$this->assertTrue(method_exists($client, 'post'), 'Missing post() method');
		$this->assertTrue(method_exists($client, 'delete'), 'Missing delete() method');
		$this->assertTrue(method_exists($client, 'put'), 'Missing put() method');
		$this->assertTrue(method_exists($client, 'patch'), 'Missing patch() method');
	}

	public function testProvidesMailchimpApi(): void
	{
		$client = $this->getClient();
		/** @noinspection UnnecessaryAssertionInspection */
		$this->assertInstanceOf(ListsApi::class, $client->lists());
		/** @noinspection UnnecessaryAssertionInspection */
		$this->assertInstanceOf(ListsMembersApi::class, $client->lists()->members('1'));
	}

	public function testBasicGetWorks(): void
	{
		$data = $this->getClient()->get('lists');
		$this->assertCount(3, $data);
		$this->assertArrayHasKey('lists', $data);
	}
}
