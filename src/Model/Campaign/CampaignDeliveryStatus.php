<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignDeliveryStatus extends AbstractData
{
	/**
	 * Whether a campaign send can be canceled.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $canCancel;

	/**
	 * The total number of emails canceled for this campaign.
	 *
	 * @var int
	 */
	public int $emailsCanceled;

	/**
	 * The total number of emails confirmed sent for this campaign so far.
	 * Example: 42.
	 *
	 * @var int
	 */
	public int $emailsSent;

	/**
	 * Whether Campaign Delivery Status is enabled for this account and campaign.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $enabled;

	/**
	 * The current state of a campaign delivery.
	 * Example: canceling.
	 *
	 * @var string
	 */
	public string $status;
}
