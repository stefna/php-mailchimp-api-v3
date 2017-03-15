<?php

namespace Stefna\Mailchimp\Api;

use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

abstract class RestApi
{
	const ACTION_ALL = 'all';
	const ACTION_ONE = 'one';
	const ACTION_CREATE = 'create';
	const ACTION_UPDATE = 'update';
	const ACTION_DELETE = 'delete';

	/**
	 * @var Client
	 */
	protected $client;

	protected $actions = [];

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
		$this->client = $client;
		$this->init();
	}

	/**
	 * @return string
	 */
	abstract public function getMethodUrl();

	public function fetch($path, $returnKey = null, $params = null)
	{
		$data = $this->client->get($path, $this->paramsToArgs($params));
		if (!$returnKey) {
			return $data;
		}
		if (!array_key_exists($returnKey, $data)) {
			return null;
		}
		return $data[$returnKey];
	}

	public function fetchOne($className, $id, $params = null)
	{
		$data = $this->fetch($this->getPath(self::ACTION_ONE, [$id]), null, $params);
		if (!$data) {
			return null;
		}
		return new $className($data);
	}

	public function fetchAll($className, $returnKey = null, $params = null)
	{
		$data = $this->fetch($this->getPath(self::ACTION_ALL), $returnKey, $params);
		if (!$data) {
			return [];
		}
		$ret = [];
		$i = 0;
		foreach ($data as $item) {
			$key = isset($item['id']) ? $item['id'] : $i++;
			$ret[$key] = new $className($item);
		}
		return $ret;
	}

	/**
	 * @return void
	 */
	protected function init()
	{

	}

	protected function doCreate(AbstractData $item, $className = null)
	{
		$data = $item->getData();
		$path = $this->getPath(self::ACTION_CREATE);
		$retData = $this->client->post($path, $data);
		if (!$className) {
			$className = get_class($item);
		}
		return new $className($retData);
	}

	protected function doUpdate($id, $data, $className)
	{
		$data = ($data instanceof AbstractData)
			? $data->getData()
			: AbstractData::snakeCaseArray($data);
		$path = $this->getPath(self::ACTION_UPDATE, [$id]);
		$retData = $this->client->patch($path, $data);
		return new $className($retData);
	}

	protected function doDelete($id)
	{
		$path = $this->getPath(self::ACTION_DELETE, [$id]);
		return $this->client->delete($path);
	}

	protected function paramsToArgs($params)
	{
		if (!$params) {
			return [];
		}
		if (is_array($params)) {
			return $params;
		}
		elseif ($params instanceof AbstractRequest) {
			return $params->toArgs();
		}
		throw new \InvalidArgumentException("Params must be an array or an AbstractParams object");
	}

	protected function getPath($action, array $params = [])
	{
		$urlAction = ($action && isset($this->actions[$action])) ? $this->actions[$action] : null;
		return implode('/', array_filter(array_merge([
			$this->getMethodUrl(),
			$urlAction,
		], $params)));
	}

}
