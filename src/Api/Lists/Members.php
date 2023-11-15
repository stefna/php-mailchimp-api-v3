<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Lists;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Lists\Request\ListsMembersAllRequest;
use Stefna\Mailchimp\Api\Lists\Request\ListsRequest;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Model\SubscriberList\ListMembers;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

class Members extends CollectionRestApi
{
	protected Lists $lists;
	protected string $listId;

	public static function formatEmailAddress(string $emailAddress): string
	{
		if (preg_match('/^[a-f0-9]{32}$/', $emailAddress)) {
			return $emailAddress;
		}
		return md5(strtolower($emailAddress));
	}

	public function __construct(Client $client, Lists $lists, string $listId)
	{
		parent::__construct($client);
		$this->lists = $lists;
		$this->listId = $listId;
	}

	public function getMethodUrl(): string
	{
		return $this->lists->getMethodUrl() . '/' . $this->listId . '/members';
	}

	/**
	 * @param ListsMembersAllRequest $params
	 * @return ListMembers[]
	 */
	public function all($params = null): array
	{
		return $this->fetchAll(ListMembers::class, 'members', $params);
	}

	/**
	 * @param ListsRequest|null $params
	 */
	public function get(string $id, ?AbstractRequest $params = null): ?ListMembers
	{
		return $this->fetchOne(ListMembers::class, self::formatEmailAddress($id), $params);
	}

	/**
	 * @param ListMembers $data
	 */
	public function create(AbstractData $data): ListMembers
	{
		return $this->doCreate($data, ListMembers::class);
	}

	/**
	 * @param AbstractData|array<string, mixed> $data
	 */
	public function update(string $id, array|AbstractData $data): ListMembers
	{
		return $this->doUpdate(self::formatEmailAddress($id), $data, ListMembers::class);
	}

	public function delete(string $id): bool
	{
		return (bool)$this->doDelete(self::formatEmailAddress($id));
	}
}
