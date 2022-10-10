<?php

namespace Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsAllRequest;
use Stefna\Mailchimp\Model\SubscriberList;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

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
	 * @param AbstractRequest|null $params
	 * @return SubscriberList|AbstractData|null
	 */
	public function get(string $id, ?AbstractRequest $params = null)
	{
		return $this->fetchOne(SubscriberList::class, $id, $params);
	}

	/**
	 * @param AbstractData|SubscriberList $campaign
	 * @return AbstractData|SubscriberList
	 */
	public function create($campaign)
	{
		return $this->doCreate($campaign);
	}

	/**
	 * @param string $id
	 * @param array<string, AbstractData>|AbstractData $data
	 * @return AbstractData|SubscriberList
	 */
	public function update(string $id, $data)
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
