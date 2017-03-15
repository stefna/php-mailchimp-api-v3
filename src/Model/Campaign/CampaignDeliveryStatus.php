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
	public $canCancel;

	/**
	 * The total number of emails canceled for this campaign.
	 *
	 * @var int
	 */
	public $emailsCanceled;

	/**
	 * The total number of emails confirmed sent for this campaign so far.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $emailsSent;

	/**
	 * Whether Campaign Delivery Status is enabled for this account and campaign.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $enabled;

	/**
	 * The current state of a campaign delivery.
	 * Example: canceling.
	 *
	 * @var string
	 */
	public $status;
}
