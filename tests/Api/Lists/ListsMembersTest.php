<?php

namespace Tests\Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Model\SubscriberList\ListMembers;
use Stefna\Mailchimp\Api\Lists\Members as MembersApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsMembersAllRequest;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class ListsMembersTest extends CollectionTestCase
{
	const LIST_ID_1 = '215f4cfac8';

	const DEFAULT_EMAIL = 'testuser+test1@example.com';

	const DEFAULT_ID = 'd4000905c79bb68b7ce9b80df716a26d';

	public function testMergeNameWorks()
	{
		$create = new ListMembers();
		$create->emailAddress = 'testuser+testmerge@example.com';
		$create->status = 'subscribed';
		$create->mergeFields = [
			'FNAME' => 'Test',
			'LNAME' => 'User',
		];
		$listId ='2f7bc35b74';
		$ret = $this->getClient()->lists()->members($listId)->create($create);
		$this->assertInstanceOf(ListMembers::class, $ret);
		$this->assertSame('Test', $ret->mergeFields['FNAME']);
	}

	/**
	 * @param ListMembers $entity
	 *
	 * @return string
	 */
	protected function getEntityId($entity)
	{
		return $entity->id;
	}

	protected function checkFetchedOne($id, $entity)
	{
		$this->assertEquals(MembersApi::formatEmailAddress($id), $this->getEntityId($entity));
		$this->checkEntityDefault($entity);
	}

	/**
	 * @param ListMembers $entity
	 * @param ListMembers $returnEntity
	 */
	protected function checkEntity($entity, $returnEntity)
	{
		$this->assertEquals($entity->emailAddress, $returnEntity->emailAddress);
	}

	/**
	 * @return string
	 */
	protected function getEntityClass()
	{
		return ListMembers::class;
	}

	/**
	 * @return string
	 */
	protected function getApiClass()
	{
		return MembersApi::class;
	}

	/**
	 * @return \Stefna\Mailchimp\Api\RestApi
	 */
	protected function getApi()
	{
		return $this->getClient()->lists()->members(self::LIST_ID_1);
	}

	/**
	 * @return string
	 */
	protected function getSingleEntityId()
	{
		return self::DEFAULT_EMAIL;
	}

	/**
	 * @param mixed $param1
	 * @param mixed $param2
	 * @return \Stefna\Mailchimp\Other\AbstractData
	 */
	protected function getNewEntity($param1 = null, $param2 = null)
	{
		if (!$param1) $param1 = self::DEFAULT_EMAIL;
		if (!$param2) $param2 = 'subscribed';
		$list = new ListMembers([
			'emailAddress' => $param1,
			'status' => $param2,
		]);
		return $list;
	}

	/**
	 * @return \Stefna\Mailchimp\Other\AbstractRequest
	 */
	protected function getAllOneParams()
	{
		return new ListsMembersAllRequest();
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam1()
	{
		return $this->getSingleEntityId();
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam2()
	{
		return 'badStatus';
	}

	/**
	 * @return string
	 */
	protected function getBadDeleteId()
	{
		return 'testuser+bad@example.com';
	}

	/**
	 * @return array
	 */
	protected function getUpdateData()
	{
		return[
			'status' => 'unsubscribed',
		];
	}
}
