<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api;

use InvalidArgumentException;
use Stefna\Mailchimp\Client;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;

abstract class RestApi
{
	public const ACTION_ALL = 'all';
	public const ACTION_ONE = 'one';
	public const ACTION_CREATE = 'create';
	public const ACTION_UPDATE = 'update';
	public const ACTION_DELETE = 'delete';
	protected Client $client;
	/**
	 * @var array<string, string>
	 */
	protected array $actions = [];

	public function __construct(Client $client)
	{
		$this->client = $client;
		$this->init();
	}

	abstract public function getMethodUrl(): string;

	/**
	 * @param string $path
	 * @param string|null $returnKey
	 * @param AbstractRequest|null $params
	 * @return array<string, mixed>|null
	 */
	public function fetch(string $path, ?string $returnKey = null, ?AbstractRequest $params = null): ?array
	{
		$data = $this->client->get($path, $this->paramsToArgs($params));
		if (!$returnKey) {
			return $data;
		}
		if (!array_key_exists($returnKey, $data)) {
			return null;
		}
		/** @var array<string, mixed> */
		return $data[$returnKey];
	}

	public function fetchOne(string           $className,
							 ?string          $id = null,
							 ?AbstractRequest $params = null
	): ?AbstractData {
		$data = $this->fetch($this->getPath(self::ACTION_ONE, [$id]), null, $params);
		if (!$data) {
			return null;
		}
		/** @var AbstractData */
		return new $className($data);
	}

	/**
	 * @template T
	 * @param class-string<T> $className
	 * @param string|null $returnKey
	 * @param AbstractRequest|null $params
	 * @return array<array-key, T>
	 */
	public function fetchAll(
		string           $className,
		?string          $returnKey = null,
		?AbstractRequest $params = null
	): array {
		$data = $this->fetch($this->getPath(self::ACTION_ALL), $returnKey, $params);
		if (!$data) {
			return [];
		}
		$ret = [];
		$i = 0;
		/** @var array{id?: string} $item */
		foreach ($data as $item) {
			$key = $item['id'] ?? $i++;
			$ret[$key] = new $className($item);
		}
		return $ret;
	}

	protected function init(): void
	{

	}

	protected function doCreate(AbstractData $item, ?string $className = null): AbstractData
	{
		$data = $item->getData();
		$path = $this->getPath(self::ACTION_CREATE);
		$retData = $this->client->post($path, $data);
		if (!$className) {
			$className = get_class($item);
		}
		/** @var AbstractData $className */
		return new $className($retData);
	}

	/**
	 * @param string $id
	 * @param array<string, mixed>|AbstractData $data
	 * @param class-string $className
	 * @return AbstractData
	 */
	protected function doUpdate(string $id, $data, string $className): AbstractData
	{
		$data = $data instanceof AbstractData
			? $data->getData()
			: AbstractData::snakeCaseArray($data);
		$path = $this->getPath(self::ACTION_UPDATE, [$id]);
		$retData = $this->client->patch($path, $data);

		/** @var AbstractData $className */
		return new $className($retData);
	}

	protected function doDelete(string $id): ?bool
	{
		$path = $this->getPath(self::ACTION_DELETE, [$id]);
		return $this->client->delete($path);
	}

	/**
	 * @param string[]|AbstractRequest|null $params
	 * @return array<string, string>
	 */
	protected function paramsToArgs($params = null)
	{
		if (!$params) {
			return [];
		}
		if (is_array($params)) {
			return $params;
		}

		if ($params instanceof AbstractRequest) {
			// @phpstan-ignore-next-line - I don't care
			return $params->toArgs();
		}
		// @phpstan-ignore-next-line
		throw new InvalidArgumentException('Params must be an array or an AbstractParams object');
	}

	/**
	 * @param string $action
	 * @param string[]|null[] $params
	 * @return string
	 */
	protected function getPath(string $action, array $params = []): string
	{
		$urlAction = $action && isset($this->actions[$action]) ? $this->actions[$action] : null;
		return implode('/', array_filter(array_merge([
			$this->getMethodUrl(),
			$urlAction,
		], $params)));
	}

}
