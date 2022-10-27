<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api\Templates;

use Stefna\Mailchimp\Api\Templates\Request\TemplatesAllRequest;
use Stefna\Mailchimp\Api\Templates\Templates as TemplatesApi;
use Stefna\Mailchimp\Model\Template\DefaultContent;
use Stefna\Mailchimp\Model\Template\NewTemplateInstance;
use Stefna\Mailchimp\Model\Template\TemplateInstance;
use Stefna\Mailchimp\Other\AbstractData;
use Stefna\Mailchimp\Other\AbstractRequest;
use Tests\Stefna\Mailchimp\Api\CollectionTestCase;

class TemplatesTest extends CollectionTestCase
{
	private const TEMPLATE_NAME = 'testTemplate1';
	private const TEMPLATE_ID = '17017';

	public function testAllWorks(): void
	{
		$this->checkAll(null, 10);
	}

	public function testDefaultContent(): void
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
	protected function checkEntity($entity, $returnEntity): void
	{
		$this->assertEquals($entity->name, $returnEntity->name);
	}

	protected function getEntityClass(): string
	{
		return TemplateInstance::class;
	}

	protected function getApiClass(): string
	{
		return TemplatesApi::class;
	}

	protected function getApi(): TemplatesApi
	{
		return $this->getClient()->templates();
	}

	protected function getSingleEntityId(): string
	{
		return self::TEMPLATE_ID;
	}

	/**
	 * @param mixed $param1
	 * @param mixed $param2
	 * @return AbstractData
	 */
	protected function getNewEntity($param1 = null, $param2 = null): AbstractData
	{
		if (!$param1) {
			$param1 = self::TEMPLATE_NAME;
		}
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

	protected function getAllOneParams(): AbstractRequest
	{
		$request = new TemplatesAllRequest();
		$request->setType('user');
		$request->setCount(1);
		return $request;
	}

	protected function getBadCreateParam1(): string
	{
		return 'myBadTemplateId';
	}

	protected function getBadCreateParam2(): string
	{
		return 'someBadFolderId';
	}

	protected function getBadDeleteId(): string
	{
		return 'noTemplate';
	}

	protected function getUpdateData(): array
	{
		return [
			'name' => 'NewTemplateName',
		];
	}

	/**
	 * @param TemplateInstance $entity
	 */
	protected function checkEntityDefault($entity): void
	{
		$this->assertTrue($entity->active);
		$this->assertEquals(self::TEMPLATE_NAME, $entity->name);
		$this->assertSame('', $entity->category);
		$this->assertNull($entity->folderId);
		$this->assertSame('user', $entity->type);
	}
}
