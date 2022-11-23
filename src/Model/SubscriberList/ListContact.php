<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Other\AbstractData;

class ListContact extends AbstractData
{
	/**
	 * The street address for the list contact.
	 * Example: 675 Ponce De Leon Ave NE.
	 */
	public string $address1;
	/**
	 * The street address for the list contact.
	 * Example: Suite 5000.
	 */
	public string $address2;
	/**
	 * The city for the list contact.
	 * Example: Atlanta.
	 */
	public string $city;
	/**
	 * The company name associated with the list.
	 * Example: Freddie's Jokes.
	 */
	public string $company;
	/**
	 * A two-character ISO3166 country code. Defaults to US if invalid.
	 * Example: 164.
	 */
	public string $country;
	/**
	 * The phone number for the list contact.
	 * Example: 8675309.
	 */
	public string $phone;
	/**
	 * The state for the list contact.
	 * Example: GA.
	 */
	public string $state;
	/**
	 * The postal or zip code for the list contact.
	 * Example: 30318.
	 */
	public string $zip;
}
