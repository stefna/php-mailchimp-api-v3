<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create\CampaignTrackingOptions;

use Stefna\Mailchimp\Other\AbstractData;

class CapsuleCRMTracking extends AbstractData
{
	/**
	 * Update contact notes for a campaign based on subscriber email addresses.
	 */
	public bool $notes;
}
