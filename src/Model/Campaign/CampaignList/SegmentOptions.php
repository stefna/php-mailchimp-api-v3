<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\CampaignList;

use Stefna\Mailchimp\Other\AbstractData;

class SegmentOptions extends AbstractData
{
	/**
	 * An array of segment conditions.
	 * https://mailchimp.com/developer/marketing/docs/alternative-schemas/#segment-condition-schemas
	 *
	 * @var array<int|array<string, string>>
	 */
	public array $conditions;
	/**
	 * Segment match type ('any' or 'all').
	 * Example: any.
	 */
	public string $match;
	/**
	 * The id for an existing saved segment.
	 * Example: 48389.
	 */
	public int $savedSegmentId;
}
