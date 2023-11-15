<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\Lists\Members;
use Stefna\Mailchimp\Api\Lists\Members as MembersApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsMembersAllRequest;
use Stefna\Mailchimp\Model\SubscriberList\ListMembers;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class ListsMembersTest extends CollectionTestCase
{
	private const LIST_ID_1 = '215f4cfac8';
	private const DEFAULT_EMAIL = 'testuser+test1@example.com';

	public function testMergeNameWorks(): void
	{
		$create = new ListMembers();
		$create->emailAddress = 'testuser+testmerge@example.com';
		$create->status = 'subscribed';
		$create->mergeFields = [
			'FNAME' => 'Test',
			'LNAME' => 'User',
		];
		$listId = '2f7bc35b74';
		$ret = $this->getClient()->lists()->members($listId)->create($create);
		$this->assertInstanceOf(ListMembers::class, $ret);
		$this->assertSame('Test', $ret->mergeFields['FNAME']);
	}

	/**
	 * @param ListMembers $entity
	 */
	protected function getEntityId(AbstractData $entity): string
	{
		return $entity->id;
	}

	/**
	 * @param ListMembers $entity
	 */
	protected function checkFetchedOne(string $id, AbstractData $entity): void
	{
		$this->assertEquals(MembersApi::formatEmailAddress($id), $this->getEntityId($entity));
		$this->checkEntityDefault($entity);
	}

	/**
	 * @param ListMembers $entity
	 * @param ListMembers $returnEntity
	 */
	protected function checkEntity(AbstractData $entity, AbstractData $returnEntity): void
	{
		$this->assertEquals($entity->emailAddress, $returnEntity->emailAddress);
	}

	protected function getEntityClass(): string
	{
		return ListMembers::class;
	}

	protected function getApiClass(): string
	{
		return MembersApi::class;
	}

	protected function getApi(): Members
	{
		return $this->getClient()->lists()->members(self::LIST_ID_1);
	}

	protected function getSingleEntityId(): string
	{
		return self::DEFAULT_EMAIL;
	}

	protected function getNewEntity(?string $param1 = null, ?string $param2 = null): AbstractData
	{
		if (!$param1) {
			$param1 = self::DEFAULT_EMAIL;
		}
		if (!$param2) {
			$param2 = 'subscribed';
		}
		return new ListMembers([
			'emailAddress' => $param1,
			'status' => $param2,
		]);
	}

	protected function getAllOneParams(): AbstractRequest
	{
		return new ListsMembersAllRequest();
	}

	protected function getBadCreateParam1(): string
	{
		return $this->getSingleEntityId();
	}

	protected function getBadCreateParam2(): string
	{
		return 'badStatus';
	}

	protected function getNotFoundId(): string
	{
		return 'testuser+bad@example.com';
	}

	/**
	 * @return array<string, string>
	 */
	protected function getUpdateData(): array
	{
		return [
			'status' => 'unsubscribed',
		];
	}
}
