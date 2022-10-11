<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Model\Campaign\SendTest;
use Tests\Stefna\Mailchimp\AbstractTestCase;

class ActionsTest extends AbstractTestCase
{
	private const CAMPAIGN_ID = '88cbf762dc';

	public function testTestWorks(): void
	{
		$data = new SendTest();
		$data->sendType = 'html';
		$data->testEmails = [
			'testuser+test@example.com',
		];
		$ret = $this->getClient()->campaigns()->actions(self::CAMPAIGN_ID)->test($data);
		$this->assertTrue($ret);
	}

	public function testSendWorks(): void
	{
		$ret = $this->getClient()->campaigns()->actions(self::CAMPAIGN_ID)->send();
		$this->assertTrue($ret);
	}
}
