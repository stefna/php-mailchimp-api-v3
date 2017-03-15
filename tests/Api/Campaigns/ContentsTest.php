<?php

namespace Tests\Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Model\Campaign\Content;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent;
use Stefna\Mailchimp\Model\Campaign\Content\CampaignContent\TemplateContent;
use Tests\Stefna\Mailchimp\AbstractTestCase;

class ContentsTest extends AbstractTestCase
{

	const CAMPAIGN_ID = '88cbf762dc';
	const DEFAULT_TEXT = 'plainTextEmailText';
	const TEMPLATE_ID = 17025;

	public function testGetWorks()
	{
		$ret = $this->getClient()->campaigns()->contents(self::CAMPAIGN_ID)->get();
		$this->assertInstanceOf(Content::class, $ret);
		$this->assertContains('<title>TestSubject 00</title>', $ret->archiveHtml);
		$this->assertContains('<title>*|MC:SUBJECT|*</title>', $ret->html);
		$this->assertNull($ret->plainText);
	}

	public function testEditWorks()
	{
		$params = new CampaignContent();
		$params->template = new TemplateContent();
		$params->template->id = self::TEMPLATE_ID;
		$params->template->sections = [
			'x1' => 'ChangedX1',
		];
		$ret = $this->getClient()->campaigns()->contents(self::CAMPAIGN_ID)->update($params);
		$this->assertInstanceOf(Content::class, $ret);
		$this->assertContains('<h1>ChangedX1</h1>', $ret->archiveHtml);
		$this->assertContains('<h1>ChangedX1</h1>', $ret->html);
		$this->assertContains('<title>*|MC:SUBJECT|*</title>', $ret->html);
	}
}
