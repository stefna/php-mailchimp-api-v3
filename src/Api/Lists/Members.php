<?php

namespace Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsMembersAllRequest;
use Stefna\Mailchimp\Api\Lists\Request\ListsRequest;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\SubscriberList\ListMembers;

class Members extends CollectionRestApi
{
	/** @var Lists */
	protected $lists;

	/** @var string */
	protected $listId;

	public function __construct(Client $client, Lists $lists, $listId)
	{
		parent::__construct($client);
		$this->lists = $lists;
		$this->listId = $listId;
	}

	public static function formatEmailAddress($emailAddress)
	{
		if (preg_match('/^[a-f0-9]{32}$/', $emailAddress)) {
			return $emailAddress;
		}
		return md5(strtolower($emailAddress));
	}

	/**
	 * @return string
	 */
	public function getMethodUrl()
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
	 * @param string $emailAddress
	 * @param array $data
	 * @return ListMembers
	 */
	public function update($emailAddress, $data)
	{
		return $this->doUpdate(Members::formatEmailAddress($emailAddress), $data, ListMembers::class);
	}

	/**
	 * @param string $emailAddress
	 * @return bool
	 */
	public function delete($emailAddress)
	{
		return $this->doDelete(Members::formatEmailAddress($emailAddress));
	}
}
