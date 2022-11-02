<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\SendChecklist\Item;
use Stefna\Mailchimp\Other\AbstractData;

class SendChecklist extends AbstractData
{
	/**
	 * Whether the campaign is ready to send.
	 */
	public bool $isReady;
	/**
	 * A list of feedback items to review before sending your campaign.
	 *
	 * @var Item[]
	 */
	public array $items;
	protected array $classMap = [
		'items' => [Item::class],
	];
}
