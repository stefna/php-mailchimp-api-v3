<?php

namespace Tests\Stefna\Mailchimp\Api;

use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Api\RestApi;
use Stefna\Mailchimp\Other\AbstractRequest;
use Tests\Stefna\Mailchimp\AbstractTestCase;

abstract class TestCase extends AbstractTestCase
{
	public function testClientApi()
	{
		$this->checkClientApi();
	}

	protected function checkCreate($param1 = null, $param2 = null)
	{
		$api = $this->getApi();
		$entity = $this->getNewEntity($param1, $param2);

		$returnEntity = $api->create($entity);
		$this->assertInstanceOf($this->getEntityClass(), $returnEntity);
		$this->checkEntity($entity, $returnEntity);
	}

	protected function checkClientApi()
	{
		$api = $this->getApi();
		$this->assertInstanceOf($this->getApiClass(), $api);
	}

	abstract protected function checkEntity($entity, $returnEntity);

	/**
	 * @return string
	 */
	abstract protected function getEntityClass();

	/**
	 * @return string
	 */
	abstract protected function getApiClass();

	/**
	 * @param AllInterface|AbstractRequest $params
	 * @param int $count
	 */
	protected function checkAll($params = null, $count = 1)
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

	protected function checkOne($id)
	{
		$api = $this->getApi();
		$entity = $api->get($id);
		$this->checkFetchedOne($id, $entity);
	}

	protected function checkFetchedOne($id, $entity)
	{
		$this->assertEquals($id, $this->getEntityId($entity));
		$this->checkEntityDefault($entity);
	}

	/**
	 * @param \Stefna\Mailchimp\Api\Request\AllInterface|AbstractRequest $params
	 */
	protected function checkAllOne(AllInterface $params)
	{
		$this->checkAll($params->setCount(1));
	}

	protected function checkBadCreate($param1, $param2)
	{
		$this->expectException(\RuntimeException::class);
		$this->expectExceptionMessage('Error from API');
		$this->checkCreate($param1, $param2);
	}

	protected function checkUpdate($id, $data)
	{
		$returnEntity = $this->getApi()->update($id, $data);
		$this->assertInstanceOf($this->getEntityClass(), $returnEntity);
		$this->checkUpdatedEntity($returnEntity, $data);
	}

	protected function checkUpdatedEntity(AbstractData $returnEntity, $data)
	{
		$returnData = $returnEntity->getData();
		$data = ($data instanceof AbstractData)
			? $data->getData()
			: AbstractData::snakeCaseArray($data);
		$this->assertEquals($data, self::array_intersect_assoc_recursive($returnData, $data));
	}

	protected function checkDelete($id)
	{
		$api = $this->getApi();
		$ret = $api->delete($id);
		$this->assertTrue($ret);
	}

	protected function checkBadDelete($id)
	{
		$api = $this->getApi();
		$ret = $api->delete($id);
		$this->assertFalse($ret);
	}

	public static function array_intersect_assoc_recursive(&$arr1, &$arr2)
	{
		if (!is_array($arr1) || !is_array($arr2)) {
			return (string)$arr1 == (string)$arr2;
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

	protected function checkEntityDefault($entity)
	{

	}

	protected function getEntityId($entity)
	{
		return $entity->id;
	}

	/**
	 * @return RestApi|\Stefna\Mailchimp\Api\CollectionRestApi
	 */
	abstract protected function getApi();

	/**
	 * @return string
	 */
	abstract protected function getSingleEntityId();

	/**
	 * @param mixed $param1
	 * @param mixed $param2
	 * @return AbstractData
	 */
	abstract protected function getNewEntity($param1 = null, $param2 = null);

	/**
	 * @return AbstractRequest
	 */
	abstract protected function getAllOneParams();

	/**
	 * @return string
	 */
	abstract protected function getBadCreateParam1();

	/**
	 * @return string
	 */
	abstract protected function getBadCreateParam2();

	/**
	 * @return string
	 */
	abstract protected function getBadDeleteId();

	/**
	 * @return array
	 */
	abstract protected function getUpdateData();
}
