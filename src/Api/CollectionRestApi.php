<?php

namespace Stefna\Mailchimp\Api;

use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

abstract class CollectionRestApi extends RestApi
{
	/**
	 * @param AbstractData $data
	 * @return AbstractData
	 */
	abstract public function create(AbstractData $data);

	/**
	 * @param AbstractRequest|null $params
	 * @return AbstractData[]
	 */
	abstract public function all(?AbstractRequest $params = null);

	/**
	 * @param string $id
	 * @param AbstractRequest|null $params
	 * @return AbstractData|null
	 */
	abstract public function get(string $id, ?AbstractRequest $params = null);

	/**
	 * @param string $id
	 * @param array<string, AbstractData>|AbstractData $data
	 * @return AbstractData
	 */
	abstract public function update(string $id, $data);

	/**
	 * @param string $id
	 * @return bool
	 */
	abstract public function delete(string $id);
}
