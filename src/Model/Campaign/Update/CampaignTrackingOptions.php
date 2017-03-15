<?php

namespace Stefna\Mailchimp\Model\Campaign\Update;

use Stefna\Mailchimp\Model\Campaign\Update\CampaignTrackingOptions\CapsuleCRMTracking;
use Stefna\Mailchimp\Model\Campaign\Update\CampaignTrackingOptions\SalesforceCRMTracking;
use Stefna\Mailchimp\Other\AbstractData;

class CampaignTrackingOptions extends AbstractData
{
	/**
	 * Capsule tracking options for a campaign. Must be using MailChimp's built-in Capsule integration.
	 *
	 * @var CapsuleCRMTracking
	 */
	public $capsule;

	/**
	 * The custom slug for [ClickTale](http://kb.mailchimp.com/integrations/other-integrations/additional-tracking-options-for-campaigns?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs#Click-Tale) tracking (max of 50 bytes).
	 *
	 * @var string
	 */
	public $clicktale;

	/**
	 * Whether to enable [eCommerce360](http://kb.mailchimp.com/integrations/other-integrations/about-ecommerce360?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) tracking.
	 *
	 * @var bool
	 */
	public $ecomm360;

	/**
	 * Whether to enable [Goal](http://kb.mailchimp.com/integrations/other-integrations/integrate-goal-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) tracking.
	 *
	 * @var bool
	 */
	public $goalTracking;

	/**
	 * The custom slug for [Google Analytics](http://kb.mailchimp.com/integrations/other-integrations/integrate-google-analytics-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) tracking (max of 50 bytes).
	 *
	 * @var string
	 */
	public $googleAnalytics;

	/**
	 * Whether to [track clicks](http://kb.mailchimp.com/reports/about-click-tracking?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) in the HTML version of the campaign. Defaults to `true`. Cannot be set to false for variate campaigns.
	 *
	 * @var bool
	 */
	public $htmlClicks;

	/**
	 * Whether to [track opens](http://kb.mailchimp.com/reports/about-open-tracking?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs). Defaults to `true`. Cannot be set to false for variate campaigns.
	 *
	 * @var bool
	 */
	public $opens;

	/**
	 * Salesforce tracking options for a campaign. Must be using MailChimp's built-in [Salesforce integration](http://kb.mailchimp.com/integrations/other-integrations/integrate-salesforce-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 *
	 * @var SalesforceCRMTracking
	 */
	public $salesforce;

	/**
	 * Whether to [track clicks](http://kb.mailchimp.com/reports/about-click-tracking?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) in the plain-text version of the campaign. Defaults to `true`. Cannot be set to false for variate campaigns.
	 *
	 * @var bool
	 */
	public $textClicks;

	/**
	 * Mapping classes.
	 *
	 * @var string[]
	 */
	protected $classMap = [
		'salesforce' => SalesforceCRMTracking::class,
		'capsule' => CapsuleCRMTracking::class,
	];
}
