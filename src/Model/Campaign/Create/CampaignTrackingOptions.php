<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create;

use Stefna\Mailchimp\Model\Campaign\Create\CampaignTrackingOptions\CapsuleCRMTracking;
use Stefna\Mailchimp\Model\Campaign\Create\CampaignTrackingOptions\SalesforceCRMTracking;
use Stefna\Mailchimp\Other\AbstractData;

class CampaignTrackingOptions extends AbstractData
{
	/**
	 * Capsule tracking options for a campaign. Must be using MailChimp's built-in Capsule integration.
	 */
	public CapsuleCRMTracking $capsule;

	/**
	 * The custom slug for [ClickTale](http://kb.mailchimp.com/integrations/other-integrations/additional-tracking-options-for-campaigns?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs#Click-Tale) tracking (max of 50 bytes).
	 */
	public string $clicktale;

	/**
	 * Whether to enable [eCommerce360](http://kb.mailchimp.com/integrations/other-integrations/about-ecommerce360?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) tracking.
	 */
	public bool $ecomm360;

	/**
	 * Whether to enable [Goal](http://kb.mailchimp.com/integrations/other-integrations/integrate-goal-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) tracking.
	 */
	public bool $goalTracking;

	/**
	 * The custom slug for [Google Analytics](http://kb.mailchimp.com/integrations/other-integrations/integrate-google-analytics-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) tracking (max of 50 bytes).
	 */
	public string $googleAnalytics;

	/**
	 * Whether to [track clicks](http://kb.mailchimp.com/reports/about-click-tracking?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) in the HTML version of the campaign. Defaults to `true`. Cannot be set to false for variate campaigns.
	 */
	public bool $htmlClicks;

	/**
	 * Whether to [track opens](http://kb.mailchimp.com/reports/about-open-tracking?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs). Defaults to `true`. Cannot be set to false for variate campaigns.
	 */
	public bool $opens;

	/**
	 * Salesforce tracking options for a campaign. Must be using MailChimp's built-in [Salesforce integration](http://kb.mailchimp.com/integrations/other-integrations/integrate-salesforce-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 */
	public SalesforceCRMTracking $salesforce;

	/**
	 * Whether to [track clicks](http://kb.mailchimp.com/reports/about-click-tracking?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) in the plain-text version of the campaign. Defaults to `true`. Cannot be set to false for variate campaigns.
	 */
	public bool $textClicks;

	protected array $classMap = [
		'salesforce' => SalesforceCRMTracking::class,
		'capsule' => CapsuleCRMTracking::class,
	];
}
