<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class Location extends AbstractData
{
	/**
	 * The unique code for the location country.
	 *
	 * @var string
	 */
	public string $countryCode;

	/**
	 * The offset for timezones where daylight saving time is observed.
	 *
	 * @var int
	 */
	public int $dstoff;

	/**
	 * The time difference in hours from GMT.
	 *
	 * @var int
	 */
	public int $gmtoff;

	/**
	 * The location latitude.
	 *
	 * @var float
	 */
	public float $latitude;

	/**
	 * The location longitude.
	 *
	 * @var float
	 */
	public float $longitude;

	/**
	 * The timezone for the location.
	 *
	 * @var string
	 */
	public string $timezone;
}
