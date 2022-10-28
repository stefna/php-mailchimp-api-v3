<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create;

use Stefna\Mailchimp\Model\Campaign\Create\RSSOptions\SendingSchedule;
use Stefna\Mailchimp\Other\AbstractData;

class RSSOptions extends AbstractData
{
	/**
	 * Whether to add CSS to images in the RSS feed to constrain their width in campaigns.
	 */
	public bool $constrainRssImg;

	/**
	 * The URL for the RSS feed.
	 */
	public string $feedUrl;

	/**
	 * The frequency of the RSS Campaign.
	 */
	public string $frequency;

	/**
	 * The schedule for sending the RSS Campaign.
	 */
	public SendingSchedule $schedule;

	protected array $classMap = [
		'schedule' => SendingSchedule::class,
	];
}
