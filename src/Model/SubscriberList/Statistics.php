<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Other\AbstractData;

class Statistics extends AbstractData
{
	/**
	 * The average float of subscriptions per month for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 */
	public float $avgSubRate;
	/**
	 * The average float of unsubscriptions per month for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 */
	public float $avgUnsubRate;
	/**
	 * The float of campaigns in any status that use this list.
	 * Example: 42.
	 */
	public int $campaignCount;
	/**
	 * The date and time the last campaign was sent to this list.
	 * Example: 2015-07-07 14:09:16.
	 */
	public string $campaignLastSent;
	/**
	 * The float of members cleaned from the given list.
	 * Example: 42.
	 */
	public int $cleanedCount;
	/**
	 * The float of members cleaned from the given list since the last campaign was sent.
	 * Example: 42.
	 */
	public int $cleanedCountSinceSend;
	/**
	 * The average click rate (a percentage represented as a float between 0 and 100) per campaign for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 */
	public float $clickRate;
	/**
	 * The date and time of the last time someone subscribed to this list.
	 * Example: 2015-07-10T19:08:46+00:00.
	 */
	public string $lastSubDate;
	/**
	 * The date and time of the last time someone unsubscribed from this list.
	 * Example: 2015-07-10T19:08:46+00:00.
	 */
	public string $lastUnsubDate;
	/**
	 * The float of active members in the given list.
	 * Example: 42.
	 */
	public int $memberCount;
	/**
	 * The float of active members in the given list since the last campaign was sent.
	 * Example: 42.
	 */
	public int $memberCountSinceSend;
	/**
	 * The float of merge vars for this list (not including the required EMAIL one).
	 * Example: 42.
	 */
	public int $mergeFieldCount;
	/**
	 * The average open rate (a percentage represented as a float between 0 and 100) per campaign for the list (not returned if we haven't calculated it yet).
	 * Example: 42.
	 */
	public float $openRate;
	/**
	 * The target float of subscriptions per month for the list to keep it growing (not returned if we haven't calculated it yet).
	 * Example: 42.
	 */
	public float $targetSubRate;
	/**
	 * The float of members who have unsubscribed from the given list.
	 * Example: 42.
	 */
	public int $unsubscribeCount;
	/**
	 * The float of members who have unsubscribed since the last campaign was sent.
	 * Example: 42.
	 */
	public int $unsubscribeCountSinceSend;
}
