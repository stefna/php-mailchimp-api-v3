<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Model\SubscriberList\ListMembers\Location;
use Stefna\Mailchimp\Model\SubscriberList\ListMembers\Notes;
use Stefna\Mailchimp\Model\SubscriberList\ListMembers\SubscriberStats;
use Stefna\Mailchimp\Other\AbstractData;

class ListMembers extends AbstractData
{
	/**
	 * Email address for a subscriber.
	 */
	public string $emailAddress;

	/**
	 * The list member's email client.
	 */
	public string $emailClient;

	/**
	 * Type of email this member asked to get ('html' or 'text').
	 */
	public string $emailType;

	/**
	 * The MD5 hash of the lowercase version of the list member's email address.
	 */
	public string $id;

	/**
	 * The key of this object's properties is the ID of the interest in question.
	 *
	 * @var string[]
	 */
	public array $interests;

	/**
	 * The IP address the subscriber used to confirm their opt-in status.
	 */
	public string $ipOpt;

	/**
	 * IP address the subscriber signed up from.
	 */
	public string $ipSignup;

	/**
	 * If set/detected, the [subscriber's language](http://kb.mailchimp.com/lists/managing-subscribers/view-and-edit-subscriber-languages?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 */
	public string $language;

	/**
	 * The date and time the member's info was last changed.
	 */
	public string $lastChanged;

	/**
	 * The most recent Note added about this member.
	 */
	public Notes $lastNote;

	/**
	 * The list id.
	 */
	public string $listId;

	/**
	 * Subscriber location information.
	 */
	public Location $location;

	/**
	 * Star rating for this member, between 1 and 5.
	 */
	public int $memberRating;

	/**
	 * An individual merge var and value for a member.
	 *
	 * @var string[]
	 */
	public array $mergeFields;

	/**
	 * Open and click rates for this subscriber.
	 */
	public SubscriberStats $stats;

	/**
	 * Subscriber's current status.
	 */
	public string $status;

	/**
	 * The date and time the subscribed confirmed their opt-in status.
	 */
	public string $timestampOpt;

	/**
	 * The date and time the subscriber signed up for the list.
	 */
	public string $timestampSignup;

	/**
	 * An identifier for the address across all of MailChimp.
	 */
	public string $uniqueEmailId;

	/**
	 * A subscriber's reason for unsubscribing.
	 */
	public string $unsubscribeReason;

	/**
	 * [VIP status](http://kb.mailchimp.com/lists/managing-subscribers/designate-and-send-to-vip-subscribers?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) for subscriber.
	 */
	public bool $vip;

	protected array $classMap = [
		'stats' => SubscriberStats::class,
		'location' => Location::class,
		'lastNote' => Notes::class,
	];
}
