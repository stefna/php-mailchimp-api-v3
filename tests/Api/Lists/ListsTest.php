<?php

namespace Tests\Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Model\SubscriberList;
use Stefna\Mailchimp\Api\Lists\Lists as ListsApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsAllRequest;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class ListsTest extends CollectionTestCase
{
	const LIST_ID_1 = '215f4cfac8';

	const MAIN_LIST_NAME = 'Main List';

	public function testTestTest()
	{
		if (false) {
			$ret = $this->getRealClient()->lists()->update(self::LIST_ID_1, ['name' => self::MAIN_LIST_NAME]);
			var_dump($ret);
		}
	}

	/**
	 * @param string $name
	 * @return SubscriberList
	 */
	protected function getNewList($name = 'MyNewTestList')
	{
		$list = new SubscriberList([
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
		return $list;
	}

	/**
	 * @return string
	 */
	protected function getEntityClass()
	{
		return SubscriberList::class;
	}

	/**
	 * @return string
	 */
	protected function getApiClass()
	{
		return ListsApi::class;
	}

	/**
	 * @return \Stefna\Mailchimp\Api\RestApi
	 */
	protected function getApi()
	{
		return $this->getClient()->lists();
	}

	/**
	 * @return string
	 */
	protected function getSingleEntityId()
	{
		return self::LIST_ID_1;
	}

	/**
	 * @param mixed $param1
	 * @param mixed $param2
	 * @return \Stefna\Mailchimp\Other\AbstractData
	 */
	protected function getNewEntity($param1 = null, $param2 = null)
	{
		if (!$param1) $param1 = self::MAIN_LIST_NAME;
		$list = new SubscriberList([
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
		return $list;
	}

	/**
	 * @return \Stefna\Mailchimp\Other\AbstractRequest
	 */
	protected function getAllOneParams()
	{
		return new ListsAllRequest();
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam1()
	{
		return 'MyNewTestListBad';
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam2()
	{
		return null;
	}

	/**
	 * @return string
	 */
	protected function getBadDeleteId()
	{
		return 'nonExisting';
	}

	/**
	 * @return array
	 */
	protected function getUpdateData()
	{
		return [
			'name' => 'ChangedName',
		];
	}

	/**
	 * @param SubscriberList $entity
	 * @param SubscriberList $returnEntity
	 */
	protected function checkEntity($entity, $returnEntity)
	{
		$this->assertEquals($entity->name, $returnEntity->name);
	}

	protected function checkEntityDefault($entity)
	{
		parent::checkEntityDefault($entity);

		$this->assertEquals(self::MAIN_LIST_NAME, $entity->name);
		$this->assertEquals('TestPermReminder', $entity->permissionReminder);
	}
}
