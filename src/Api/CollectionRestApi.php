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
	abstract public function create($data);

	/**
	 * @param AbstractRequest $params
	 * @return AbstractData[]
	 */
	abstract public function all($params = null);

	/**
	 * @param mixed $id
	 * @param AbstractRequest|null $params
	 * @return AbstractData
	 */
	abstract public function get($id, $params = null);

	/**
	 * @param mixed $id
	 * @param array|AbstractData $data
	 * @return AbstractData
	 */
	abstract public function update($id, $data);

	/**
	 * @param mixed $id
	 * @return bool
	 */
	abstract public function delete($id);
}
