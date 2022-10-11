<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Api\Campaigns;

use Stefna\Mailchimp\Model\Campaign\SendChecklist;
use Tests\Stefna\Mailchimp\AbstractTestCase;

class ChecklistTest extends AbstractTestCase
{
	private const CAMPAIGN_ID = '88cbf762dc';

	public function testGetWorks(): void
	{
		$ret = $this->getClient()->campaigns()->checklist(self::CAMPAIGN_ID);
		$this->assertInstanceOf(SendChecklist::class, $ret);
		$this->assertTrue($ret->isReady);
		$this->assertArrayHasKey(0, $ret->items);
		$this->assertSame('success', $ret->items[0]->type);
		$this->assertSame('List', $ret->items[0]->heading);
		$this->assertSame('MailChimp will deliver this to the Test Test List list. (1 recipients)', $ret->items[0]->details);

		$this->assertArrayHasKey(8, $ret->items);
		$this->assertSame('success', $ret->items[8]->type);
		$this->assertSame('MonkeyRewards', $ret->items[8]->heading);
		$this->assertSame('A MailChimp affiliate link is included in your template footer.', $ret->items[8]->details);
	}
}
