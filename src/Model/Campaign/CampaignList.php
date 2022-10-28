<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\CampaignList\SegmentOptions;
use Stefna\Mailchimp\Other\AbstractData;

class CampaignList extends AbstractData
{
	/**
	 * The id of the list.
	 * Example: 1a2df69xxx.
	 */
	public string $listId;

	/**
	 * The name of the list.
	 */
	public string $listName;

	/**
	 * Count of the recipients on the associated list. Formatted as an integer.
	 */
	public int $recipientCount;

	/**
	 * Segment options.
	 */
	public SegmentOptions $segmentOpts;

	/**
	 * A string marked-up with HTML explaining the segment used for the campaign in plain English.
	 */
	public string $segmentText;

	protected array $classMap = [
		'segmentOpts' => SegmentOptions::class,
	];
}
