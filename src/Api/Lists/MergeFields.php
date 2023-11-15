<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsAllRequest;
use Stefna\Mailchimp\Api\Lists\Request\ListsRequest;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\SubscriberList\ListMergeFields;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

class MergeFields extends CollectionRestApi
{
	protected Lists $lists;
	protected string $listId;

	public function __construct(Client $client, Lists $lists, string $listId)
	{
		parent::__construct($client);
		$this->lists = $lists;
		$this->listId = $listId;
	}

	/**
	 * @param ListMergeFields $data
	 */
	public function create(AbstractData $data): AbstractData
	{
		return $this->doCreate($data, ListMergeFields::class);
	}

	/**
	 * @param ListsAllRequest|null $params
	 * @return ListMergeFields[]
	 */
	public function all(?AbstractRequest $params = null): array
	{
		return $this->fetchAll(ListMergeFields::class, 'merge_fields', $params);
	}

	/**
	 * @param ListsRequest|null $params
	 */
	public function get(string $id, ?AbstractRequest $params = null): ?ListMergeFields
	{
		return $this->fetchOne(ListMergeFields::class, $id, $params);
	}

	/**
	 * @param AbstractData|array<string, mixed> $data
	 */
	public function update(string $id, array|AbstractData $data): ListMergeFields
	{
		return $this->doUpdate($id, $data, ListMergeFields::class);
	}

	public function delete(string $id): bool
	{
		return (bool)$this->doDelete($id);
	}

	public function getMethodUrl(): string
	{
		return $this->lists->getMethodUrl() . '/' . $this->listId . '/merge-fields';
	}
}
