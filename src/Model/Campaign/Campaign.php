<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class Campaign extends AbstractData
{
	/**
	 * AB Split-specific options for a campaign.
	 *
	 * @var ABSplitOptions
	 */
	public $abSplitOpts;

	/**
	 * The link to the campaign's archive version.
	 * Example: http://eepurl.com/bsOxxx.
	 *
	 * @var string
	 */
	public $archiveUrl;

	/**
	 * How the campaign's content is put together ('template', 'drag_and_drop', 'html', 'url').
	 * Example: template.
	 *
	 * @var string
	 */
	public $contentType;

	/**
	 * The date and time the campaign was created.
	 * Example: 2015-07-09T13:14:28+00:00.
	 *
	 * @var string
	 */
	public $createTime;

	/**
	 * Updates on campaigns in the process of sending.
	 *
	 * @var CampaignDeliveryStatus
	 */
	public $deliveryStatus;

	/**
	 * The total number of emails sent for this campaign.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $emailsSent;

	/**
	 * A string that uniquely identifies this campaign.
	 * Example: 839488a60b.
	 *
	 * @var string
	 */
	public $id;

	/**
	 * The original link to the campaign's archive version.
	 *
	 * @var string
	 */
	public $longArchiveUrl;

	/**
	 * List settings for the campaign.
	 *
	 * @var CampaignList
	 */
	public $recipients;

	/**
	 * For sent campaigns, a summary of opens, clicks, and unsubscribes.
	 *
	 * @var CampaignReportSummary
	 */
	public $reportSummary;

	/**
	 * RSS-specific options for a campaign.
	 *
	 * @var RSSOptions
	 */
	public $rssOpts;

	/**
	 * The time and date a campaign was sent.
	 * Example: 2015-07-09T13:14:28+00:00.
	 *
	 * @var string
	 */
	public $sendTime;

	/**
	 * @var CampaignSettings
	 */
	public $settings;

	/**
	 * The preview for the campaign as rendered by social networks like Facebook and Twitter.
	 *
	 * @var CampaignSocialCard
	 */
	public $socialCard;

	/**
	 * The current status of the campaign ('save', 'paused', 'schedule', 'sending', 'sent').
	 * Example: save.
	 *
	 * @var string
	 */
	public $status;

	/**
	 * The tracking options for a campaign.
	 *
	 * @var CampiagnTrackingOptions
	 */
	public $tracking;

	/**
	 * The type of campaign (regular, plaintext, absplit, or rss).
	 * Example: regular.
	 *
	 * @var string
	 */
	public $type;

	/**
	 * The settings specific to A/B test campaigns.
	 *
	 * @var ABTestOptions
	 */
	public $variateSettings;

	/**
	 * Mapping classes.
	 *
	 * @var string[]
	 */
	protected $classMap = [
		'recipients' => CampaignList::class,
		'settings' => CampaignSettings::class,
		'variateSettings' => ABTestOptions::class,
		'tracking' => CampiagnTrackingOptions::class,
		'rssOpts' => RSSOptions::class,
		'abSplitOpts' => ABSplitOptions::class,
		'socialCard' => CampaignSocialCard::class,
		'reportSummary' => CampaignReportSummary::class,
		'deliveryStatus' => CampaignDeliveryStatus::class,
	];
}
