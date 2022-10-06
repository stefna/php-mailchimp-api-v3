<?php

namespace Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsAllRequest;
use Stefna\Mailchimp\Model\SubscriberList;
use Stefna\Mailchimp\Other\AbstractData;

class Lists extends CollectionRestApi
{
	public function getMethodUrl(): string
	{
		return 'lists';
	}

	/**
	 * @param ListsAllRequest|null $params
	 * @return SubscriberList[]
	 */
	public function all($params = null)
	{
		return $this->fetchAll(SubscriberList::class, 'lists', $params);
	}

	/**
	 * @param string $id
	 * @param Lists|null $params
	 * @return SubscriberList|AbstractData|null
	 */
	public function get($id, $params = null)
	{
		return $this->fetchOne(SubscriberList::class, $id, $params);
	}

	/**
	 * @param SubscriberList $campaign
	 * @return SubscriberList
	 */
	public function create($campaign)
	{
		return $this->doCreate($campaign);
	}

	/**
	 * @param string $id
	 * @param array $data
	 * @return SubscriberList
	 */
	public function update(string $id, $data): SubscriberList
	{
		return $this->doUpdate($id, $data, SubscriberList::class);
	}

	public function delete(string $id): ?bool
	{
		return $this->doDelete($id);
	}

	public function members(string $listId): Members
	{
		return new Members($this->client, $this, $listId);
	}
}
