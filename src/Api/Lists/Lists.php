<?php declare(strict_types=1);

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
	public function all($params = null): array
	{
		return $this->fetchAll(SubscriberList::class, 'lists', $params);
	}

	public function get(string $id, ?AbstractRequest $params = null): ?SubscriberList
	{
		return $this->fetchOne(SubscriberList::class, $id, $params);
	}

	/**
	 * @param SubscriberList $data
	 */
	public function create(AbstractData $data): SubscriberList
	{
		return $this->doCreate($data, SubscriberList::class);
	}

	/**
	 * @param AbstractData|array<string, mixed> $data
	 */
	public function update(string $id, array|AbstractData $data): SubscriberList
	{
		return $this->doUpdate($id, $data, SubscriberList::class);
	}

	public function delete(string $id): bool
	{
		return (bool)$this->doDelete($id);
	}

	public function members(string $listId): Members
	{
		return new Members($this->client, $this, $listId);
	}

	public function mergeFields(string $listId): MergeFields
	{
		return new MergeFields($this->client, $this, $listId);
	}
}
