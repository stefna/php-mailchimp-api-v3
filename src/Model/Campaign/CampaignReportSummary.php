<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignReportSummary extends AbstractData
{
	/**
	 * The number of unique subscribers who clicked divided by the total number of successful deliveries.
	 * Example: 42.
	 *
	 * @var number
	 */
	public $clickRate;

	/**
	 * The total number of clicks for a campaign.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $clicks;

	/**
	 * The number of unique opens divided by the total number of successful deliveries.
	 * Example: 42.
	 *
	 * @var number
	 */
	public $openRate;

	/**
	 * The total number of opens for a campaign.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $opens;

	/**
	 * The number of unique subscribers who clicked.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $subscriberClicks;

	/**
	 * The number of unique subscribers who opened.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $uniqueOpens;
}
