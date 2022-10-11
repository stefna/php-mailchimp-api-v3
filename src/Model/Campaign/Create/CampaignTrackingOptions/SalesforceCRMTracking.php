<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create\CampaignTrackingOptions;

use Stefna\Mailchimp\Other\AbstractData;

class SalesforceCRMTracking extends AbstractData
{
	/**
	 * Create a campaign in a connected Salesforce account.
	 *
	 * @var bool
	 */
	public bool $campaign;

	/**
	 * Update contact notes for a campaign based on subscriber email addresses.
	 *
	 * @var bool
	 */
	public bool $notes;
}
