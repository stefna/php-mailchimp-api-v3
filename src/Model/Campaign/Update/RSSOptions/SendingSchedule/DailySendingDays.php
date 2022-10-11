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
	public bool $friday;

	/**
	 * Sends the daily RSS Campaign on Mondays.
	 *
	 * @var bool
	 */
	public bool $monday;

	/**
	 * Sends the daily RSS Campaign on Saturdays.
	 *
	 * @var bool
	 */
	public bool $saturday;

	/**
	 * Sends the daily RSS Campaign on Sundays.
	 *
	 * @var bool
	 */
	public bool $sunday;

	/**
	 * Sends the daily RSS Campaign on Thursdays.
	 *
	 * @var bool
	 */
	public bool $thursday;

	/**
	 * Sends the daily RSS Campaign on Tuesdays.
	 *
	 * @var bool
	 */
	public bool $tuesday;

	/**
	 * Sends the daily RSS Campaign on Wednesdays.
	 *
	 * @var bool
	 */
	public bool $wednesday;
}
