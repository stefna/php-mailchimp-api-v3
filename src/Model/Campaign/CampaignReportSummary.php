<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignReportSummary extends AbstractData
{
	/**
	 * The number of unique subscribers who clicked divided by the total number of successful deliveries.
	 * Example: 42.
	 *
	 */
	public float $clickRate;

	/**
	 * The total number of clicks for a campaign.
	 * Example: 42.
	 *
	 */
	public int $clicks;

	/**
	 * The number of unique opens divided by the total number of successful deliveries.
	 * Example: 42.
	 *
	 */
	public float $openRate;

	/**
	 * The total number of opens for a campaign.
	 * Example: 42.
	 *
	 * @var int
	 */
	public int $opens;

	/**
	 * The number of unique subscribers who clicked.
	 * Example: 42.
	 *
	 * @var int
	 */
	public int $subscriberClicks;

	/**
	 * The number of unique subscribers who opened.
	 * Example: 42.
	 *
	 * @var int
	 */
	public int $uniqueOpens;
}
