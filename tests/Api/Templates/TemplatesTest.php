<?php

namespace Tests\Stefna\Mailchimp\Api\Templates;

use Stefna\Mailchimp\Api\Templates\Request\TemplatesAllRequest;
use Stefna\Mailchimp\Api\Templates\Templates as TemplatesApi;
use Stefna\Mailchimp\Model\Template\DefaultContent;
use Stefna\Mailchimp\Model\Template\NewTemplateInstance;
use Stefna\Mailchimp\Model\Template\TemplateInstance;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class TemplatesTest extends CollectionTestCase
{
	const TEMPLATE_NAME = 'testTemplate1';
	const TEMPLATE_ID = '17017';

	public function testAllWorks()
	{
		$this->checkAll(null, 10);
	}

	public function testOneWorks()
	{
		parent::testOneWorks();
	}


	public function testAllOneWorks()
	{
		parent::testAllOneWorks();
	}

	public function testUpdateWorks()
	{
		parent::testUpdateWorks();
	}

	public function testDeleteWorks()
	{
		parent::testDeleteWorks();
	}

	public function testCreateBadFails()
	{
		parent::testCreateBadFails();
	}

	public function testDefaultContent()
	{
		$templateId = '17025';
		$content = $this->getClient()->templates()->getDefault($templateId);
		$this->assertInstanceOf(DefaultContent::class, $content);
		$this->assertSame([
			'x1' => 'Blahh',
			'x2' => 'Testing 123',
		], $content->sections);
	}

	/**
	 * @param NewTemplateInstance $entity
	 * @param TemplateInstance $returnEntity
	 */
	protected function checkEntity($entity, $returnEntity)
	{
		$this->assertEquals($entity->name, $returnEntity->name);
	}

	/**
	 * @return string
	 */
	protected function getEntityClass()
	{
		return TemplateInstance::class;
	}

	/**
	 * @return string
	 */
	protected function getApiClass()
	{
		return TemplatesApi::class;
	}

	/**
	 * @return \Stefna\Mailchimp\Api\Templates\Templates
	 *
	 */
	protected function getApi()
	{
		return $this->getClient()->templates();
	}

	/**
	 * @return string
	 */
	protected function getSingleEntityId()
	{
		return self::TEMPLATE_ID;
	}

	/**
	 * @param mixed $param1
	 * @param mixed $param2
	 * @return \Stefna\Mailchimp\Other\AbstractData
	 */
	protected function getNewEntity($param1 = null, $param2 = 'null')
	{
		if (!$param1) $param1 = self::TEMPLATE_NAME;
		$template = new NewTemplateInstance();
		$template->name = $param1;
		if ($param2) {
			$template->folderId = $param2;
		}
		$template->html = <<<'EOD'
<html>
	<head>
		<title>*|MC:SUBJECT|*</title>
		<style type="text/css"></style>
	</head>
	<body>
		<h1>Stuff</h1>
		<p>More stuff</p>
	</body>
</html>
EOD;
		return $template;
	}

	/**
	 * @return \Stefna\Mailchimp\Other\AbstractRequest
	 */
	protected function getAllOneParams()
	{
		$request = new TemplatesAllRequest();
		$request->setType('user')->setCount(1);
		return $request;
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam1()
	{
		return 'myBadTemplateId';
	}

	/**
	 * @return string
	 */
	protected function getBadCreateParam2()
	{
		return 'someBadFolderId';
	}

	/**
	 * @return string
	 */
	protected function getBadDeleteId()
	{
		return 'noTemplate';
	}

	/**
	 * @return array
	 */
	protected function getUpdateData()
	{
		return [
			'name' => 'NewTemplateName',
		];
	}

	/**
	 * @param TemplateInstance $entity
	 */
	protected function checkEntityDefault($entity)
	{
		$this->assertTrue($entity->active);
		$this->assertEquals(self::TEMPLATE_NAME, $entity->name);
		$this->assertSame('', $entity->category);
		$this->assertNull($entity->folderId);
		$this->assertSame('user', $entity->type);
	}
}
