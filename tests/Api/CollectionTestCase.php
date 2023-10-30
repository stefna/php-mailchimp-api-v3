<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api;

abstract class CollectionTestCase extends TestCase
{
	public function testClientApi(): void
	{
		$this->checkClientApi();
	}

	public function testCreateWorks(): void
	{
		$this->checkCreate();
	}

	public function testAllWorks(): void
	{
		$this->checkAll();
	}

	public function testOneWorks(): void
	{
		$this->checkOne($this->getSingleEntityId());
	}

	public function testAllOneWorks(): void
	{
		$this->checkAllOne($this->getAllOneParams());
	}

	public function testCreateBadFails(): void
	{
		$this->checkBadCreate($this->getBadCreateParam1(), $this->getBadCreateParam2());
	}

	public function testUpdateWorks(): void
	{
		$this->checkUpdate($this->getSingleEntityId(), $this->getUpdateData());
	}

	public function testDeleteWorks(): void
	{
		$this->checkDelete($this->getSingleEntityId());
	}

	public function testDeleteNotFound(): void
	{
		$this->checkBadDelete($this->getNotFoundId());
	}
}
