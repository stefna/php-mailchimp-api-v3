<?php

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Other\AbstractData;

class ListContact extends AbstractData
{
	/**
	 * The street address for the list contact.
	 * Example: 675 Ponce De Leon Ave NE.
	 *
	 * @var string
	 */
	public $address1;

	/**
	 * The street address for the list contact.
	 * Example: Suite 5000.
	 *
	 * @var string
	 */
	public $address2;

	/**
	 * The city for the list contact.
	 * Example: Atlanta.
	 *
	 * @var string
	 */
	public $city;

	/**
	 * The company name associated with the list.
	 * Example: Freddie's Jokes.
	 *
	 * @var string
	 */
	public $company;

	/**
	 * A two-character ISO3166 country code. Defaults to US if invalid.
	 * Example: 164.
	 *
	 * @var string
	 */
	public $country;

	/**
	 * The phone number for the list contact.
	 * Example: 8675309.
	 *
	 * @var string
	 */
	public $phone;

	/**
	 * The state for the list contact.
	 * Example: GA.
	 *
	 * @var string
	 */
	public $state;

	/**
	 * The postal or zip code for the list contact.
	 * Example: 30318.
	 *
	 * @var string
	 */
	public $zip;
}
