<?php

namespace Stefna\Mailchimp\Model\Campaign\CreateTrackingOptions;

use Stefna\Mailchimp\Other\AbstractData;

class SalesforceCRMTracking extends AbstractData
{
	/**
	 * Create a campaign in a connected Salesforce account.
	 *
	 * @var bool
	 */
	public $campaign;

	/**
	 * Update contact notes for a campaign based on subscriber email addresses.
	 *
	 * @var bool
	 */
	public $notes;
}
