<?php

namespace Stefna\Mailchimp\Model\Campaign\CampaignList;

use Stefna\Mailchimp\Other\AbstractData;

class SegmentOptions extends AbstractData
{
	/**
	 * An array of segment conditions.
	 * https://mailchimp.com/developer/marketing/docs/alternative-schemas/#segment-condition-schemas
	 * @var array<int|array<string, string>>
	 */
	public $conditions;

	/**
	 * Segment match type ('any' or 'all').
	 * Example: any.
	 *
	 * @var string
	 */
	public $match;

	/**
	 * The id for an existing saved segment.
	 * Example: 48389.
	 *
	 * @var int
	 */
	public $savedSegmentId;
}
