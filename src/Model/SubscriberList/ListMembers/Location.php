<?php

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class Location extends AbstractData
{
	/**
	 * The unique code for the location country.
	 *
	 * @var string
	 */
	public $countryCode;

	/**
	 * The offset for timezones where daylight saving time is observed.
	 *
	 * @var int
	 */
	public $dstoff;

	/**
	 * The time difference in hours from GMT.
	 *
	 * @var int
	 */
	public $gmtoff;

	/**
	 * The location latitude.
	 *
	 * @var number
	 */
	public $latitude;

	/**
	 * The location longitude.
	 *
	 * @var number
	 */
	public $longitude;

	/**
	 * The timezone for the location.
	 *
	 * @var string
	 */
	public $timezone;
}
