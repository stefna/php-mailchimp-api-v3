<?php

namespace Stefna\Mailchimp\Model\Campaign\Update\RSSOptions;

use Stefna\Mailchimp\Model\Campaign\Update\RSSOptions\SendingSchedule\DailySendingDays;
use Stefna\Mailchimp\Other\AbstractData;

class SendingSchedule extends AbstractData
{
	/**
	 * The days of the week to send a daily RSS Campaign.
	 *
	 * @var DailySendingDays
	 */
	public DailySendingDays $dailySend;

	/**
	 * The hour to send the campaign in local time. Acceptable hours are 0-23. For example, '4' would be 4am in [your account's default time zone](http://kb.mailchimp.com/accounts/account-setup/how-to-set-account-defaults?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 *
	 * @var int
	 */
	public int $hour;

	/**
	 * The day of the month to send a monthly RSS Campaign. Acceptable days are 0-31, where '0' is always the last day of a month. Months with fewer than the selected number of days will not have an RSS campaign sent out that day. For example, RSS Campaigns set to send on the 30th will not go out in February.
	 *
	 * @var number
	 */
	public number $monthlySendDate;

	/**
	 * The day of the week to send a weekly RSS Campaign.
	 *
	 * @var string
	 */
	public string $weeklySendDay;

	/**
	 * Mapping classes.
	 *
	 */
	protected array $classMap = [
		'dailySend' => DailySendingDays::class,
	];
}
