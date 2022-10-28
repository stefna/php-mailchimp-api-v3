<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignDeliveryStatus extends AbstractData
{
	/**
	 * Whether a campaign send can be canceled.
	 * Example: 1.
	 */
	public bool $canCancel;

	/**
	 * The total number of emails canceled for this campaign.
	 */
	public int $emailsCanceled;

	/**
	 * The total number of emails confirmed sent for this campaign so far.
	 * Example: 42.
	 */
	public int $emailsSent;

	/**
	 * Whether Campaign Delivery Status is enabled for this account and campaign.
	 * Example: 1.
	 */
	public bool $enabled;

	/**
	 * The current state of a campaign delivery.
	 * Example: canceling.
	 */
	public string $status;
}
