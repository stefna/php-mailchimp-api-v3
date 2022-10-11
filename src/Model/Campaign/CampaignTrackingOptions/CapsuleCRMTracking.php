<?php

namespace Stefna\Mailchimp\Model\Campaign\CampaignTrackingOptions;

use Stefna\Mailchimp\Other\AbstractData;

class CapsuleCRMTracking extends AbstractData
{
	/**
	 * Update contact notes for a campaign based on subscriber email addresses.
	 *
	 * @var bool
	 */
	public $notes;
}
