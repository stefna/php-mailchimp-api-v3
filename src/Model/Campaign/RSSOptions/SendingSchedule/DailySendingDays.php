<?php

namespace Stefna\Mailchimp\Model\Campaign\RSSOptions\SendingSchedule;

use Stefna\Mailchimp\Other\AbstractData;

class DailySendingDays extends AbstractData
{
	/**
	 * Sends the daily RSS campaign on Fridays.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $friday;

	/**
	 * Sends the daily RSS campaign on Mondays.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $monday;

	/**
	 * Sends the daily RSS campaign on Saturdays.
	 *
	 * @var bool
	 */
	public $saturday;

	/**
	 * Sends the daily RSS campaign on Sundays.
	 *
	 * @var bool
	 */
	public $sunday;

	/**
	 * Sends the daily RSS campaign on Thursdays.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $thursday;

	/**
	 * Sends the daily RSS campaign on Tuesdays.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $tuesday;

	/**
	 * Sends the daily RSS campaign on Wednesdays.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $wednesday;
}
