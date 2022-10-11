<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api;

use Stefna\Mailchimp\Api\CollectionRestApi;
use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Api\RestApi;
use Stefna\Mailchimp\Other\AbstractRequest;
use Tests\Stefna\Mailchimp\AbstractTestCase;

abstract class TestCase extends AbstractTestCase
{
	public function testClientApi(): void
	{
		$this->checkClientApi();
	}

	protected function checkCreate($param1 = null, $param2 = null): void
	{
		$api = $this->getApi();
		$entity = $this->getNewEntity($param1, $param2);

		$returnEntity = $api->create($entity);
		/** @noinspection UnnecessaryAssertionInspection */
		$this->assertInstanceOf($this->getEntityClass(), $returnEntity);
		$this->checkEntity($entity, $returnEntity);
	}

	protected function checkClientApi(): void
	{
		$api = $this->getApi();
		$this->assertInstanceOf($this->getApiClass(), $api);
	}

	abstract protected function checkEntity($entity, $returnEntity);

	abstract protected function getEntityClass(): string;

	abstract protected function getApiClass(): string;

	/**
	 * @param AllInterface|AbstractRequest $params
	 * @param int $count
	 */
	protected function checkAll($params = null, int $count = 1): void
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

	protected function checkOne($id): void
	{
		$api = $this->getApi();
		$entity = $api->get($id);
		$this->checkFetchedOne($id, $entity);
	}

	protected function checkFetchedOne($id, $entity): void
	{
		$this->assertEquals($id, $this->getEntityId($entity));
		$this->checkEntityDefault($entity);
	}

	/**
	 * @param AllInterface|AbstractRequest $params
	 */
	protected function checkAllOne(AllInterface $params): void
	{
		$params->setCount(1);
		$this->checkAll($params);
	}

	protected function checkBadCreate($param1, $param2): void
	{
		$this->expectException(\RuntimeException::class);
		$this->expectExceptionMessage('Error from API');
		$this->checkCreate($param1, $param2);
	}

	protected function checkUpdate($id, $data): void
	{
		$returnEntity = $this->getApi()->update($id, $data);
		$this->assertInstanceOf($this->getEntityClass(), $returnEntity);
		$this->checkUpdatedEntity($returnEntity, $data);
	}

	protected function checkUpdatedEntity(AbstractData $returnEntity, $data): void
	{
		$returnData = $returnEntity->getData();
		$data = $data instanceof AbstractData
			? $data->getData()
			: AbstractData::snakeCaseArray($data);
		$this->assertEquals($data, self::array_intersect_assoc_recursive($returnData, $data));
	}

	protected function checkDelete($id): void
	{
		$api = $this->getApi();
		$ret = $api->delete($id);
		$this->assertTrue($ret);
	}

	protected function checkBadDelete($id): void
	{
		$api = $this->getApi();
		$ret = $api->delete($id);
		$this->assertFalse($ret);
	}

	public static function array_intersect_assoc_recursive(&$arr1, &$arr2)
	{
		if (!is_array($arr1) || !is_array($arr2)) {
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

	protected function checkEntityDefault($entity): void
	{

	}

	protected function getEntityId($entity)
	{
		return $entity->id;
	}

	/**
	 * @return RestApi|CollectionRestApi
	 */
	abstract protected function getApi();

	abstract protected function getSingleEntityId(): string;

	/**
	 * @param mixed $param1
	 * @param mixed $param2
	 * @return AbstractData
	 */
	abstract protected function getNewEntity($param1 = null, $param2 = null): AbstractData;

	abstract protected function getAllOneParams(): AbstractRequest;

	abstract protected function getBadCreateParam1(): string;

	abstract protected function getBadCreateParam2(): ?string;

	abstract protected function getBadDeleteId(): string;

	/**
	 * @return array|AbstractData
	 */
	abstract protected function getUpdateData();
}
