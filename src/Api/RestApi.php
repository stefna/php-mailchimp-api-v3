<?php

namespace Stefna\Mailchimp\Api;

use InvalidArgumentException;
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
	protected Client $client;
	/**
	 * @var array<string, string>
	 */
	protected array $actions = [];

	/**
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
		$this->client = $client;
		$this->init();
	}

	abstract public function getMethodUrl(): string;

	/**
	 * @param string $path
	 * @param string|null $returnKey
	 * @param array<string, array>|null $params
	 * @return array|null
	 */
	public function fetch(string $path, ?string $returnKey = null, array $params = null): ?array
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

	/**
	 * @param string $className
	 * @param string|null $id
	 * @param array|null $params
	 * @return AbstractData|null
	 */
	public function fetchOne(string $className, ?string $id = null, $params = null): ?AbstractData
	{
		$data = $this->fetch($this->getPath(self::ACTION_ONE, [$id]), null, $params);
		if (!$data) {
			return null;
		}
		return new $className($data);
	}

	/**
	 * @param string $className
	 * @param string|null $returnKey
	 * @param AbstractRequest|array|null $params
	 * @return array
	 */
	public function fetchAll(string $className, ?string $returnKey = null, $params = null): array
	{
		$data = $this->fetch($this->getPath(self::ACTION_ALL), $returnKey, $params);
		if (!$data) {
			return [];
		}
		$ret = [];
		$i = 0;
		foreach ($data as $item) {
			$key = $item['id'] ?? $i++;
			$ret[$key] = new $className($item);
		}
		return $ret;
	}

	protected function init(): void
	{

	}

	/**
	 * @param AbstractData $item
	 * @param string|null $className
	 * @return mixed|AbstractData
	 */
	protected function doCreate(AbstractData $item, ?string $className = null)
	{
		$data = $item->getData();
		$path = $this->getPath(self::ACTION_CREATE);
		$retData = $this->client->post($path, $data);
		if (!$className) {
			$className = get_class($item);
		}
		return new $className($retData);
	}

	/**
	 * @param string $id
	 * @param array|AbstractData $data
	 * @param string $className
	 * @return mixed
	 */
	protected function doUpdate(string $id, $data, string $className)
	{
		$data = ($data instanceof AbstractData)
			? $data->getData()
			: AbstractData::snakeCaseArray($data);
		$path = $this->getPath(self::ACTION_UPDATE, [$id]);
		$retData = $this->client->patch($path, $data);
		return new $className($retData);
	}

	protected function doDelete(string $id): ?bool
	{
		$path = $this->getPath(self::ACTION_DELETE, [$id]);
		return $this->client->delete($path);
	}

	/**
	 * @param array|AbstractRequest $params
	 * @return array<string, array>
	 */
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
		throw new InvalidArgumentException("Params must be an array or an AbstractParams object");
	}

	protected function getPath(string $action, array $params = []): string
	{
		$urlAction = ($action && isset($this->actions[$action])) ? $this->actions[$action] : null;
		return implode('/', array_filter(array_merge([
			$this->getMethodUrl(),
			$urlAction,
		], $params)));
	}

}
