<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class Location extends AbstractData
{
	/**
	 * The unique code for the location country.
	 */
	public string $countryCode;
	/**
	 * The offset for timezones where daylight saving time is observed.
	 */
	public int $dstoff;
	/**
	 * The time difference in hours from GMT.
	 */
	public int $gmtoff;
	/**
	 * The location latitude.
	 */
	public float $latitude;
	/**
	 * The location longitude.
	 */
	public float $longitude;
	/**
	 * The timezone for the location.
	 */
	public string $timezone;
}
