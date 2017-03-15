<?php

namespace Tests\Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Model\Campaign\SendTest;
use Tests\Stefna\Mailchimp\AbstractTestCase;

class ActionsTest extends AbstractTestCase
{
	const CAMPAIGN_ID = '88cbf762dc';

	public function testTestWorks()
	{
		$data = new SendTest();
		$data->sendType = 'html';
		$data->testEmails = [
			'testuser+test@example.com',
		];
		$ret = $this->getClient()->campaigns()->actions(self::CAMPAIGN_ID)->test($data);
		$this->assertSame(true, $ret);
	}

	public function testSendWorks()
	{
		$ret = $this->getClient()->campaigns()->actions(self::CAMPAIGN_ID)->send();
		$this->assertSame(true, $ret);
	}
}
