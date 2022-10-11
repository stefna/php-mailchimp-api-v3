<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\CampaignList\SegmentOptions;
use Stefna\Mailchimp\Other\AbstractData;

class CampaignList extends AbstractData
{
	/**
	 * The id of the list.
	 * Example: 1a2df69xxx.
	 *
	 * @var string
	 */
	public string $listId;

	/**
	 * The name of the list.
	 *
	 * @var string
	 */
	public string $listName;

	/**
	 * Count of the recipients on the associated list. Formatted as an integer.
	 *
	 * @var int
	 */
	public int $recipientCount;

	/**
	 * Segment options.
	 *
	 * @var SegmentOptions
	 */
	public SegmentOptions $segmentOpts;

	/**
	 * A string marked-up with HTML explaining the segment used for the campaign in plain English.
	 *
	 * @var string
	 */
	public string $segmentText;

	/**
	 * Mapping classes.
	 *
	 */
	protected array $classMap = [
		'segmentOpts' => SegmentOptions::class,
	];
}
