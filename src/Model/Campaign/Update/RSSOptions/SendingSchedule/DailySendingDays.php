<?php

namespace Stefna\Mailchimp\Model\Campaign\Update\RSSOptions\SendingSchedule;

use Stefna\Mailchimp\Other\AbstractData;

class DailySendingDays extends AbstractData
{
	/**
	 * Sends the daily RSS Campaign on Fridays.
	 *
	 * @var bool
	 */
	public $friday;

	/**
	 * Sends the daily RSS Campaign on Mondays.
	 *
	 * @var bool
	 */
	public $monday;

	/**
	 * Sends the daily RSS Campaign on Saturdays.
	 *
	 * @var bool
	 */
	public $saturday;

	/**
	 * Sends the daily RSS Campaign on Sundays.
	 *
	 * @var bool
	 */
	public $sunday;

	/**
	 * Sends the daily RSS Campaign on Thursdays.
	 *
	 * @var bool
	 */
	public $thursday;

	/**
	 * Sends the daily RSS Campaign on Tuesdays.
	 *
	 * @var bool
	 */
	public $tuesday;

	/**
	 * Sends the daily RSS Campaign on Wednesdays.
	 *
	 * @var bool
	 */
	public $wednesday;
}
