<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Update\CampaignTrackingOptions;

use Stefna\Mailchimp\Other\AbstractData;

class SalesforceCRMTracking extends AbstractData
{
	/**
	 * Create a campaign in a connected Salesforce account.
	 */
	public bool $campaign;

	/**
	 * Update contact notes for a campaign based on subscriber email addresses.
	 */
	public bool $notes;
}
