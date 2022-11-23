<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api;

use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

abstract class CollectionRestApi extends RestApi
{
	abstract public function create(AbstractData $data): AbstractData;

	/**
	 * @return AbstractData[]
	 */
	abstract public function all(?AbstractRequest $params = null): array;

	abstract public function get(string $id, ?AbstractRequest $params = null): ?AbstractData;

	/**
	 * @param array<string, AbstractData>|AbstractData $data
	 */
	abstract public function update(string $id, $data): AbstractData;

	abstract public function delete(string $id): bool;
}
