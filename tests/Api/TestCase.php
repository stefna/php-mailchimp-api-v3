<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Exceptions\NotFoundException;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;
use Tests\Stefna\Mailchimp\AbstractTestCase;

abstract class TestCase extends AbstractTestCase
{
	/**
	 * @param scalar|array<string, mixed> $arr1
	 * @param scalar|array<string, mixed> $arr2
	 * @return bool|array<string, mixed>
	 */
	public static function array_intersect_assoc_recursive(mixed &$arr1, mixed &$arr2): bool|array
	{
		if (!is_array($arr1) || !is_array($arr2)) {
			// @phpstan-ignore-next-line
			return (string)$arr1 === (string)$arr2;
		}
		$commonkeys = array_intersect(array_keys($arr1), array_keys($arr2));
		$ret = [];
		foreach ($commonkeys as $key) {
			if (self::array_intersect_assoc_recursive($arr1[$key], $arr2[$key])) {
				$ret[$key] = $arr2[$key];
			}
		}
		return $ret;
	}

	public function testClientApi(): void
	{
		$this->checkClientApi();
	}

	abstract protected function checkEntity(AbstractData $entity, AbstractData $returnEntity): void;

	/**
	 * @return class-string<AbstractData>
	 */
	abstract protected function getEntityClass(): string;

	/**
	 * @return class-string<CollectionRestApi>
	 */
	abstract protected function getApiClass(): string;

	abstract protected function getApi(): CollectionRestApi;

	abstract protected function getSingleEntityId(): string;

	abstract protected function getNewEntity(?string $param1 = null, ?string $param2 = null): AbstractData;

	/**
	 * @return AbstractRequest&AllInterface
	 */
	abstract protected function getAllOneParams(): AbstractRequest;

	abstract protected function getBadCreateParam1(): string;

	abstract protected function getBadCreateParam2(): ?string;

	abstract protected function getNotFoundId(): string;

	/**
	 * @return array<string, mixed>|AbstractData
	 */
	abstract protected function getUpdateData(): array|AbstractData;

	abstract protected function getEntityId(AbstractData $entity): string;

	protected function checkCreate(?string $param1 = null, ?string $param2 = null): void
	{
		$api = $this->getApi();
		$entity = $this->getNewEntity($param1, $param2);

		$returnEntity = $api->create($entity);
		$this->assertInstanceOf($this->getEntityClass(), $returnEntity);
		$this->checkEntity($entity, $returnEntity);
	}

	protected function checkClientApi(): void
	{
		$api = $this->getApi();
		$this->assertInstanceOf($this->getApiClass(), $api);
	}

	/**
	 * @param (AbstractRequest&AllInterface)|null $params
	 */
	protected function checkAll(?AbstractRequest $params = null, int $count = 1): void
	{
		$api = $this->getApi();
		$data = $api->all($params);
		$this->assertCount($count, $data);
		$firstKey = array_keys($data)[0];
		$entity = $data[$firstKey];
		$this->assertInstanceOf($this->getEntityClass(), $entity);
		$this->assertEquals($firstKey, $this->getEntityId($entity));
		$this->checkEntityDefault($entity);
	}

	protected function checkOne(string $id): void
	{
		$api = $this->getApi();
		$entity = $api->get($id);
		$this->assertNotNull($entity);
		$this->checkFetchedOne($id, $entity);
	}

	protected function checkFetchedOne(string $id, AbstractData $entity): void
	{
		$this->assertEquals($id, $this->getEntityId($entity));
		$this->checkEntityDefault($entity);
	}

	/**
	 * @param AllInterface&AbstractRequest $params
	 */
	protected function checkAllOne(AllInterface $params): void
	{
		$params->setCount(1);
		$this->checkAll($params);
	}

	protected function checkBadCreate(?string $param1, ?string $param2): void
	{
		$this->expectException(\RuntimeException::class);
		$this->expectExceptionMessage('Error from API');
		$this->checkCreate($param1, $param2);
	}

	/**
	 * @param array<string, mixed>|AbstractData $data
	 */
	protected function checkUpdate(string $id, array|AbstractData $data): void
	{
		$returnEntity = $this->getApi()->update($id, $data);
		$this->assertNotNull($returnEntity);
		$this->assertInstanceOf($this->getEntityClass(), $returnEntity);
		$this->checkUpdatedEntity($returnEntity, $data);
	}

	/**
	 * @param array<string, mixed>|AbstractData $data
	 */
	protected function checkUpdatedEntity(AbstractData $returnEntity, array|AbstractData $data): void
	{
		$returnData = $returnEntity->getData();
		$data = $data instanceof AbstractData
			? $data->getData()
			: AbstractData::snakeCaseArray($data);
		$this->assertEquals($data, self::array_intersect_assoc_recursive($returnData, $data));
	}

	protected function checkDelete(string $id): void
	{
		$api = $this->getApi();
		$ret = $api->delete($id);
		$this->assertTrue($ret);
	}

	protected function checkBadDelete(string $id): void
	{
		$api = $this->getApi();
		$ret = $api->delete($id);
		$this->assertFalse($ret);
	}

	protected function checkGetNotFound(string $id): void
	{
		$api = $this->getApi();
		$ret = $api->get($id);
		$this->assertNull($ret);
	}

	protected function checkPatchNotFound(string $id): void
	{
		$api = $this->getApi();
		$this->expectException(NotFoundException::class);
		$api->update($id, []);
	}

	protected function checkEntityDefault(mixed $entity): void
	{
	}
}
