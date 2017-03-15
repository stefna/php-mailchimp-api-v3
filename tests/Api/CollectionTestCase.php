<?php

namespace Tests\Stefna\Mailchimp\Api;

abstract class CollectionTestCase extends TestCase
{
	public function testClientApi()
	{
		$this->checkClientApi();
	}

	public function testCreateWorks()
	{
		$this->checkCreate();
	}

	public function testAllWorks()
	{
		$this->checkAll();
	}

	public function testOneWorks()
	{
		$this->checkOne($this->getSingleEntityId());
	}

	public function testAllOneWorks()
	{
		$this->checkAllOne($this->getAllOneParams());
	}

	public function testCreateBadFails()
	{
		$this->checkBadCreate($this->getBadCreateParam1(), $this->getBadCreateParam2());
	}

	public function testUpdateWorks()
	{
		$this->checkUpdate($this->getSingleEntityId(), $this->getUpdateData());
	}

	public function testDeleteWorks()
	{
		$this->checkDelete($this->getSingleEntityId());
	}

	public function testDeleteNotFound()
	{
		$this->checkBadDelete($this->getBadDeleteId());
	}
}
