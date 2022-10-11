<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\RestApi;
use Stefna\Mailchimp\Model\SubscriberList;
use Stefna\Mailchimp\Api\Lists\Lists as ListsApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsAllRequest;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class ListsTest extends CollectionTestCase
{
	private const LIST_ID_1 = '215f4cfac8';
	private const MAIN_LIST_NAME = 'Main List';

	public function testTestTest(): void
	{
		$this->markTestSkipped('See commented out code');
		/*$ret = $this->getRealClient()->lists()->update(self::LIST_ID_1, ['name' => self::MAIN_LIST_NAME]);
		var_dump($ret);*/
	}

	protected function getNewList(string $name = 'MyNewTestList'): SubscriberList
	{
		return new SubscriberList([
			'name' => $name,
			'permissionReminder' => 'Testing Permission Reminder',
			'emailTypeOption' => false,
			'contact' => [
				'company' => 'TestCompany',
				'address1' => 'TestAddress1',
				'city' => 'TestCity',
				'state' => '',
				'zip' => '600',
				'country' => 'IS',
			],
			'campaignDefaults' => [
				'fromName' => 'TestFromName',
				'fromEmail' => 'testuser+test@example.com',
				'subject' => 'TestSubject',
				'language' => 'en',
			],
		]);
	}

	protected function getEntityClass(): string
	{
		return SubscriberList::class;
	}

	protected function getApiClass(): string
	{
		return ListsApi::class;
	}

	protected function getApi(): RestApi
	{
		return $this->getClient()->lists();
	}

	protected function getSingleEntityId(): string
	{
		return self::LIST_ID_1;
	}

	/**
	 * @param mixed $param1
	 * @param mixed $param2
	 * @return AbstractData
	 */
	protected function getNewEntity($param1 = null, $param2 = null): AbstractData
	{
		if (!$param1) {
			$param1 = self::MAIN_LIST_NAME;
		}
		return new SubscriberList([
			'name' => $param1,
			'permissionReminder' => 'Testing Permission Reminder',
			'emailTypeOption' => false,
			'contact' => [
				'company' => 'TestCompany',
				'address1' => 'TestAddress1',
				'city' => 'TestCity',
				'state' => '',
				'zip' => '600',
				'country' => 'IS',
			],
			'campaignDefaults' => [
				'fromName' => 'TestFromName',
				'fromEmail' => 'testuser+test@example.com',
				'subject' => 'TestSubject',
				'language' => 'en',
			],
		]);
	}

	protected function getAllOneParams():AbstractRequest
	{
		return new ListsAllRequest();
	}

	protected function getBadCreateParam1(): string
	{
		return 'MyNewTestListBad';
	}

	protected function getBadCreateParam2(): ?string
	{
		return null;
	}

	protected function getBadDeleteId(): string
	{
		return 'nonExisting';
	}

	protected function getUpdateData(): array
	{
		return [
			'name' => 'ChangedName',
		];
	}

	/**
	 * @param SubscriberList $entity
	 * @param SubscriberList $returnEntity
	 */
	protected function checkEntity($entity, $returnEntity): void
	{
		$this->assertEquals($entity->name, $returnEntity->name);
	}

	protected function checkEntityDefault($entity): void
	{
		parent::checkEntityDefault($entity);

		$this->assertEquals(self::MAIN_LIST_NAME, $entity->name);
		$this->assertEquals('TestPermReminder', $entity->permissionReminder);
	}
}
