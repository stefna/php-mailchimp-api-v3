<?php

namespace Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsMembersAllRequest;
use Stefna\Mailchimp\Api\Lists\Request\ListsRequest;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\SubscriberList\ListMembers;

class Members extends CollectionRestApi
{
	protected Lists $lists;

	protected string $listId;

	public function __construct(Client $client, Lists $lists, string $listId)
	{
		parent::__construct($client);
		$this->lists = $lists;
		$this->listId = $listId;
	}

	public static function formatEmailAddress(string $emailAddress): string
	{
		if (preg_match('/^[a-f0-9]{32}$/', $emailAddress)) {
			return $emailAddress;
		}
		return md5(strtolower($emailAddress));
	}

	public function getMethodUrl(): string
	{
		return $this->lists->getMethodUrl() . '/' . $this->listId . '/members';
	}

	/**
	 * @param ListsMembersAllRequest $params
	 * @return ListMembers[]
	 */
	public function all($params = null)
	{
		return $this->fetchAll(ListMembers::class, 'members', $params);
	}

	/**
	 * @param string $emailAddress
	 * @param ListsRequest|null $params
	 * @return ListMembers
	 */
	public function get($emailAddress, $params = null)
	{
		return $this->fetchOne(ListMembers::class, Members::formatEmailAddress($emailAddress), $params);
	}

	/**
	 * @param ListMembers $members
	 * @return ListMembers
	 */
	public function create($members)
	{
		return $this->doCreate($members);
	}

	/**
	 * @param string $id
	 * @param array $data
	 * @return ListMembers
	 */
	public function update(string $id, $data): ListMembers
	{
		return $this->doUpdate(Members::formatEmailAddress($id), $data, ListMembers::class);
	}

	public function delete(string $id): ?bool
	{
		return $this->doDelete(Members::formatEmailAddress($id));
	}
}
