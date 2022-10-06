<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\SendChecklist\Item;
use Stefna\Mailchimp\Other\AbstractData;

class SendChecklist extends AbstractData
{
	/**
	 * Whether the campaign is ready to send.
	 *
	 * @var bool
	 */
	public $isReady;

	/**
	 * A list of feedback items to review before sending your campaign.
	 *
	 * @var Item[]
	 */
	public $items;

	protected array $classMap = [
		'items' => [Item::class],
	];
}
