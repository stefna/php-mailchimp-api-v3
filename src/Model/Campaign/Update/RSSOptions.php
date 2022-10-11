<?php

namespace Stefna\Mailchimp\Model\Campaign\Update;

use Stefna\Mailchimp\Model\Campaign\Update\RSSOptions\SendingSchedule;
use Stefna\Mailchimp\Other\AbstractData;

class RSSOptions extends AbstractData
{
	/**
	 * Whether to add CSS to images in the RSS feed to constrain their width in campaigns.
	 *
	 * @var bool
	 */
	public bool $constrainRssImg;

	/**
	 * The URL for the RSS feed.
	 *
	 * @var string
	 */
	public string $feedUrl;

	/**
	 * The frequency of the RSS Campaign.
	 *
	 * @var string
	 */
	public string $frequency;

	/**
	 * The schedule for sending the RSS Campaign.
	 *
	 * @var SendingSchedule
	 */
	public SendingSchedule $schedule;

	/**
	 * Mapping classes.
	 *
	 */
	protected array $classMap = [
		'schedule' => SendingSchedule::class,
	];
}
