<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api\Campaigns;

use ReflectionProperty;
use Stefna\Mailchimp\Model\Campaign\Content;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent\TemplateContent;
use Tests\Stefna\Mailchimp\AbstractTestCase;

class ContentsTest extends AbstractTestCase
{
	private const CAMPAIGN_ID = '88cbf762dc';
	private const TEMPLATE_ID = 17025;

	public function testGetWorks(): void
	{
		/** @var Content $ret */
		$ret = $this->getClient()->campaigns()->contents(self::CAMPAIGN_ID)->get();
		$this->assertInstanceOf(Content::class, $ret);
		$this->assertStringContainsString('<title>TestSubject 00</title>', $ret->archiveHtml);
		$this->assertStringContainsString('<title>*|MC:SUBJECT|*</title>', $ret->html);
		$rp = new ReflectionProperty(Content::class, 'plainText');
		$this->assertFalse($rp->isInitialized($ret));

	}

	public function testEditWorks(): void
	{
		$params = new CampaignContent();
		$params->template = new TemplateContent();
		$params->template->id = self::TEMPLATE_ID;
		$params->template->sections = [
			'x1' => 'ChangedX1',
		];
		$ret = $this->getClient()->campaigns()->contents(self::CAMPAIGN_ID)->update($params);
		/** @noinspection UnnecessaryAssertionInspection */
		$this->assertInstanceOf(Content::class, $ret);
		$this->assertStringContainsString('<h1>ChangedX1</h1>', $ret->archiveHtml);
		$this->assertStringContainsString('<h1>ChangedX1</h1>', $ret->html);
		$this->assertStringContainsString('<title>*|MC:SUBJECT|*</title>', $ret->html);
	}
}
