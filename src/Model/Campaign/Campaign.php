<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class Campaign extends AbstractData
{
	/**
	 * AB Split-specific options for a campaign.
	 */
	public ABSplitOptions $abSplitOpts;
	/**
	 * The link to the campaign's archive version.
	 * Example: http://eepurl.com/bsOxxx.
	 */
	public string $archiveUrl;
	/**
	 * How the campaign's content is put together ('template', 'drag_and_drop', 'html', 'url').
	 * Example: template.
	 */
	public string $contentType;
	/**
	 * The date and time the campaign was created.
	 * Example: 2015-07-09T13:14:28+00:00.
	 */
	public string $createTime;
	/**
	 * Updates on campaigns in the process of sending.
	 */
	public CampaignDeliveryStatus $deliveryStatus;
	/**
	 * The total number of emails sent for this campaign.
	 * Example: 42.
	 */
	public int $emailsSent;
	/**
	 * A string that uniquely identifies this campaign.
	 * Example: 839488a60b.
	 */
	public string $id;
	/**
	 * The original link to the campaign's archive version.
	 */
	public string $longArchiveUrl;
	/**
	 * List settings for the campaign.
	 */
	public CampaignList $recipients;
	/**
	 * For sent campaigns, a summary of opens, clicks, and unsubscribes.
	 */
	public CampaignReportSummary $reportSummary;
	/**
	 * RSS-specific options for a campaign.
	 */
	public RSSOptions $rssOpts;
	/**
	 * The time and date a campaign was sent.
	 * Example: 2015-07-09T13:14:28+00:00.
	 */
	public string $sendTime;
	public CampaignSettings $settings;
	/**
	 * The preview for the campaign as rendered by social networks like Facebook and Twitter.
	 */
	public CampaignSocialCard $socialCard;
	/**
	 * The current status of the campaign ('save', 'paused', 'schedule', 'sending', 'sent').
	 * Example: save.
	 */
	public string $status;
	/**
	 * The tracking options for a campaign.
	 */
	public CampaignTrackingOptions $tracking;
	/**
	 * The type of campaign (regular, plaintext, absplit, or rss).
	 * Example: regular.
	 */
	public string $type;
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
		'abSplitOpts' => ABSplitOptions::class,
		'socialCard' => CampaignSocialCard::class,
		'reportSummary' => CampaignReportSummary::class,
		'deliveryStatus' => CampaignDeliveryStatus::class,
	];
}
