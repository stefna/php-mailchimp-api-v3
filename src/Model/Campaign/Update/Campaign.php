<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Update;

use Stefna\Mailchimp\Other\AbstractData;

class Campaign extends AbstractData
{
	/**
	 * [A/B Testing](http://kb.mailchimp.com/campaigns/ab/about-ab-testing-campaigns?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) options for a campaign.
	 */
	public ABTestingOptions $abSplitOpts;
	/**
	 * List settings for the campaign.
	 */
	public CampaignList $recipients;
	/**
	 * [RSS](http://kb.mailchimp.com/campaigns/rss-in-campaigns/create-an-rss-campaign?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) options for a campaign.
	 */
	public RSSOptions $rssOpts;
	/**
	 * The settings for your campaign, including subject, from name, reply-to address, and more.
	 */
	public CampaignSettings $settings;
	/**
	 * The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](http://kb.mailchimp.com/campaigns/previews-and-tests/set-up-social-cards?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 */
	public CampaignSocialCard $socialCard;
	/**
	 * The tracking options for a campaign.
	 */
	public CampaignTrackingOptions $tracking;
	/**
	 * The settings specific to A/B test campaigns.
	 */
	public ABTestOptions $variateSettings;
	protected array $classMap = [
		'recipients' => CampaignList::class,
		'settings' => CampaignSettings::class,
		'variateSettings' => ABTestOptions::class,
		'tracking' => CampaignTrackingOptions::class,
		'rssOpts' => RSSOptions::class,
		'abSplitOpts' => ABTestingOptions::class,
		'socialCard' => CampaignSocialCard::class,
	];
}
