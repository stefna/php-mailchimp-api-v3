<?php

namespace Stefna\Mailchimp\Model\Campaign\Create;

use Stefna\Mailchimp\Model\Campaign\Create\RSSOptions\SendingSchedule;
use Stefna\Mailchimp\Other\AbstractData;

class RSSOptions extends AbstractData
{
	/**
	 * Whether to add CSS to images in the RSS feed to constrain their width in campaigns.
	 *
	 * @var bool
	 */
	public $constrainRssImg;

	/**
	 * The URL for the RSS feed.
	 *
	 * @var string
	 */
	public $feedUrl;

	/**
	 * The frequency of the RSS Campaign.
	 *
	 * @var string
	 */
	public $frequency;

	/**
	 * The schedule for sending the RSS Campaign.
	 *
	 * @var SendingSchedule
	 */
	public $schedule;

	/**
	 * Mapping classes.
	 *
	 * @var string[]
	 */
	protected $classMap = [
		'schedule' => SendingSchedule::class,
	];
}
