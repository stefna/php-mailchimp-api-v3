<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\CampaignTrackingOptions\CapsuleCRMTracking;
use Stefna\Mailchimp\Model\Campaign\CampaignTrackingOptions\SalesforceCRMTracking;
use Stefna\Mailchimp\Other\AbstractData;

class CampaignTrackingOptions extends AbstractData
{
	/**
	 * Capsule tracking options for a campaign. Must be using MailChimp's built-in Capsule integration.
	 *
	 * @var CapsuleCRMTracking
	 */
	public CapsuleCRMTracking $capsule;

	/**
	 * The custom slug for ClickTale Analytics tracking (max of 50 bytes).
	 * Example: Freddies_Jokes_2015_07_07.
	 *
	 * @var string
	 */
	public string $clicktale;

	/**
	 * Whether to enable eCommerce360 tracking.
	 *
	 * @var bool
	 */
	public bool $ecomm360;

	/**
	 * Whether to enable Goal tracking. For more information, see this Knowledge Base article: http://eepurl.com/GPMdH
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $goalTracking;

	/**
	 * The custom slug for Google Analytics tracking (max of 50 bytes).
	 * Example: Freddies_Jokes_2015_07_07.
	 *
	 * @var string
	 */
	public string $googleAnalytics;

	/**
	 * Whether to track clicks in the HTML version of the campaign. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $htmlClicks;

	/**
	 * Whether to track opens. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $opens;

	/**
	 * Salesforce tracking options for a campaign.  Must be using MailChimp's built-in Salesforce integration.
	 *
	 * @var SalesforceCRMTracking
	 */
	public SalesforceCRMTracking $salesforce;

	/**
	 * Whether to track clicks in the plain-text version of the campaign. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $textClicks;

	/**
	 * Mapping classes.
	 *
	 */
	protected array $classMap = [
		'salesforce' => SalesforceCRMTracking::class,
		'capsule' => CapsuleCRMTracking::class,
	];
}
