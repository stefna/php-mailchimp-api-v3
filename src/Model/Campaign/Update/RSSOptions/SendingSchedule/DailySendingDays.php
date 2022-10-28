<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Update\RSSOptions\SendingSchedule;

use Stefna\Mailchimp\Other\AbstractData;

class DailySendingDays extends AbstractData
{
	/**
	 * Sends the daily RSS Campaign on Fridays.
	 */
	public bool $friday;
	/**
	 * Sends the daily RSS Campaign on Mondays.
	 */
	public bool $monday;
	/**
	 * Sends the daily RSS Campaign on Saturdays.
	 */
	public bool $saturday;
	/**
	 * Sends the daily RSS Campaign on Sundays.
	 */
	public bool $sunday;
	/**
	 * Sends the daily RSS Campaign on Thursdays.
	 */
	public bool $thursday;
	/**
	 * Sends the daily RSS Campaign on Tuesdays.
	 */
	public bool $tuesday;
	/**
	 * Sends the daily RSS Campaign on Wednesdays.
	 */
	public bool $wednesday;
}
