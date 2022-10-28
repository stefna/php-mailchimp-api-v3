<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create;

use Stefna\Mailchimp\Other\AbstractData;

class Campaign extends AbstractData
{
	/**
	 * [A/B Testing](http://kb.mailchimp.com/campaigns/ab/about-ab-testing-campaigns?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) options for a campaign.
	 *
	 * @var ABTestingOptions
	 */
	public ABTestingOptions $abSplitOpts;
	/**
	 * List settings for the campaign.
	 *
	 * @var CampaignList
	 */
	public CampaignList $recipients;
	/**
	 * [RSS](http://kb.mailchimp.com/campaigns/rss-in-campaigns/create-an-rss-campaign?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) options for a campaign.
	 *
	 * @var RSSOptions
	 */
	public RSSOptions $rssOpts;
	/**
	 * The settings for your campaign, including subject, from name, reply-to address, and more.
	 *
	 * @var CampaignSettings
	 */
	public CampaignSettings $settings;
	/**
	 * The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](http://kb.mailchimp.com/campaigns/previews-and-tests/set-up-social-cards?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 *
	 * @var CampaignSocialCard
	 */
	public CampaignSocialCard $socialCard;
	/**
	 * The tracking options for a campaign.
	 *
	 * @var CampaignTrackingOptions
	 */
	public CampaignTrackingOptions $tracking;
	/**
	 * There are four types of [campaigns](http://kb.mailchimp.com/campaigns?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) you can create in MailChimp. A/B Split campaigns have been deprecated and variate campaigns should be used instead.
	 */
	public string $type;
	/**
	 * The settings specific to A/B test campaigns.
	 *
	 * @var ABTestOptions
	 */
	public ABTestOptions $variateSettings;
	/**
	 * Mapping classes.
	 */
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
