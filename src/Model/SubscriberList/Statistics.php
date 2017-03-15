<?php

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Other\AbstractData;

class Statistics extends AbstractData
{
	/**
	 * The average number of subscriptions per month for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 *
	 * @var number
	 */
	public $avgSubRate;

	/**
	 * The average number of unsubscriptions per month for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 *
	 * @var number
	 */
	public $avgUnsubRate;

	/**
	 * The number of campaigns in any status that use this list.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $campaignCount;

	/**
	 * The date and time the last campaign was sent to this list.
	 * Example: 2015-07-07 14:09:16.
	 *
	 * @var string
	 */
	public $campaignLastSent;

	/**
	 * The number of members cleaned from the given list.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $cleanedCount;

	/**
	 * The number of members cleaned from the given list since the last campaign was sent.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $cleanedCountSinceSend;

	/**
	 * The average click rate (a percentage represented as a number between 0 and 100) per campaign for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 *
	 * @var number
	 */
	public $clickRate;

	/**
	 * The date and time of the last time someone subscribed to this list.
	 * Example: 2015-07-10T19:08:46+00:00.
	 *
	 * @var string
	 */
	public $lastSubDate;

	/**
	 * The date and time of the last time someone unsubscribed from this list.
	 * Example: 2015-07-10T19:08:46+00:00.
	 *
	 * @var string
	 */
	public $lastUnsubDate;

	/**
	 * The number of active members in the given list.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $memberCount;

	/**
	 * The number of active members in the given list since the last campaign was sent.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $memberCountSinceSend;

	/**
	 * The number of merge vars for this list (not including the required EMAIL one).
	 * Example: 42.
	 *
	 * @var int
	 */
	public $mergeFieldCount;

	/**
	 * The average open rate (a percentage represented as a number between 0 and 100) per campaign for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 *
	 * @var number
	 */
	public $openRate;

	/**
	 * The target numberof subscriptions per month for the list to keep it growing (not returned if we haven't calculated it yet).
	 * Example: 42.
	 *
	 * @var number
	 */
	public $targetSubRate;

	/**
	 * The number of members who have unsubscribed from the given list.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $unsubscribeCount;

	/**
	 * The number of members who have unsubscribed since the last campaign was sent.
	 * Example: 42.
	 *
	 * @var int
	 */
	public $unsubscribeCountSinceSend;
}
