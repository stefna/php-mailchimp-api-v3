<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Model\Campaign\RSSOptions\SendingSchedule;
use Stefna\Mailchimp\Other\AbstractData;

class RSSOptions extends AbstractData
{
	/**
	 * If true we will add css to images in the rss feed to constrain their width in the campaign content.
	 */
	public bool $constrainRssImg;

	/**
	 * The URL for the RSS feed.
	 * Example: http://blog.mailchimp.com/feed/.
	 */
	public string $feedUrl;

	/**
	 * The frequency of the RSS-to-Email campaign ('daily', 'weekly', 'monthly').
	 * Example: weekly.
	 */
	public string $frequency;

	/**
	 * The date the campaign was last sent.
	 * Example: 2015-07-09T13:14:28+00:00.
	 */
	public string $lastSent;

	/**
	 * The schedule for sending the RSS campaign.
	 */
	public SendingSchedule $schedule;

	protected array $classMap = [
		'schedule' => SendingSchedule::class,
	];
}
