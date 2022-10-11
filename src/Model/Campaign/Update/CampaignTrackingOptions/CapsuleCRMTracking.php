<?php

namespace Stefna\Mailchimp\Model\Campaign\Update\CampaignTrackingOptions;

use Stefna\Mailchimp\Other\AbstractData;

class CapsuleCRMTracking extends AbstractData
{
	/**
	 * Update contact notes for a campaign based on subscriber email addresses.
	 *
	 * @var bool
	 */
	public bool $notes;
}
