<?php

namespace Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsAllRequest;
use Stefna\Mailchimp\Model\SubscriberList;

class Lists extends CollectionRestApi
{
	/**
	 * @return string
	 */
	public function getMethodUrl()
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
	 * @return SubscriberList
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
	public function update($id, $data)
	{
		return $this->doUpdate($id, $data, SubscriberList::class);
	}

	/**
	 * @param string $id
	 * @return bool
	 */
	public function delete($id)
	{
		return $this->doDelete($id);
	}

	public function members($listId)
	{
		return new Members($this->client, $this, $listId);
	}
}
