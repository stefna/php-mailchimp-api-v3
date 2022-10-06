<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\CampiagnTrackingOptions\CapsuleCRMTracking;
use Stefna\Mailchimp\Model\Campaign\CampiagnTrackingOptions\SalesforceCRMTracking;
use Stefna\Mailchimp\Other\AbstractData;

class CampiagnTrackingOptions extends AbstractData
{
	/**
	 * Capsule tracking option sfor a campaign. Must be using MailChimp's built-in Capsule integration.
	 *
	 * @var CapsuleCRMTracking
	 */
	public $capsule;

	/**
	 * The custom slug for ClickTale Analytics tracking (max of 50 bytes).
	 * Example: Freddies_Jokes_2015_07_07.
	 *
	 * @var string
	 */
	public $clicktale;

	/**
	 * Whether to enable eCommerce360 tracking.
	 *
	 * @var bool
	 */
	public $ecomm360;

	/**
	 * Whether to enable Goal tracking. For more information, see this Knowledge Base article: http://eepurl.com/GPMdH
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $goalTracking;

	/**
	 * The custom slug for Google Analytics tracking (max of 50 bytes).
	 * Example: Freddies_Jokes_2015_07_07.
	 *
	 * @var string
	 */
	public $googleAnalytics;

	/**
	 * Whether to track clicks in the HTML version of the campaign. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $htmlClicks;

	/**
	 * Whether to track opens. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $opens;

	/**
	 * Salesforce tracking options for a campaign.  Must be using MailChimp's built-in Salesforce integration.
	 *
	 * @var SalesforceCRMTracking
	 */
	public $salesforce;

	/**
	 * Whether to track clicks in the plain-text version of the campaign. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $textClicks;

	/**
	 * Mapping classes.
	 *
	 */
	protected array $classMap = [
		'salesforce' => SalesforceCRMTracking::class,
		'capsule' => CapsuleCRMTracking::class,
	];
}
