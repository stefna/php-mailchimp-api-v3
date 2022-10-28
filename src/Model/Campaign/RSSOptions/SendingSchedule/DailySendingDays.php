<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\RSSOptions\SendingSchedule;

use Stefna\Mailchimp\Other\AbstractData;

class DailySendingDays extends AbstractData
{
	/**
	 * Sends the daily RSS campaign on Fridays.
	 * Example: 1.
	 */
	public bool $friday;

	/**
	 * Sends the daily RSS campaign on Mondays.
	 * Example: 1.
	 */
	public bool $monday;

	/**
	 * Sends the daily RSS campaign on Saturdays.
	 */
	public bool $saturday;

	/**
	 * Sends the daily RSS campaign on Sundays.
	 */
	public bool $sunday;

	/**
	 * Sends the daily RSS campaign on Thursdays.
	 * Example: 1.
	 */
	public bool $thursday;

	/**
	 * Sends the daily RSS campaign on Tuesdays.
	 * Example: 1.
	 */
	public bool $tuesday;

	/**
	 * Sends the daily RSS campaign on Wednesdays.
	 * Example: 1.
	 */
	public bool $wednesday;
}
