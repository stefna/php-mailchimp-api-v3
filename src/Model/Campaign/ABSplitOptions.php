<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class ABSplitOptions extends AbstractData
{
	/**
	 * For campaigns split on 'From Name', the name for Group A.
	 * Example: Urist McVankab.
	 */
	public string $fromNameA;
	/**
	 * For campaigns split on 'From Name', the name for Group B.
	 * Example: Freddie.
	 */
	public string $fromNameB;
	/**
	 * How we should evaluate a winner. Based on 'opens', 'clicks', or 'manual'.
	 * Example: opens.
	 */
	public string $pickWinner;
	/**
	 * For campaigns split on 'From Name', the reply-to address for Group A.
	 * Example: urist.mcvankab@freddiesjokes.com.
	 */
	public string $replyEmailA;
	/**
	 * For campaigns split on 'From Name', the reply-to address for Group B.
	 * Example: freddie@freddiesjokes.com.
	 */
	public string $replyEmailB;
	/**
	 * The send time for Group A.
	 * Example: 2015-07-09T13:00:00+00:00.
	 */
	public string $sendTimeA;
	/**
	 * The send time for Group B.
	 * Example: 2015-07-09T08:00:00+00:00.
	 */
	public string $sendTimeB;
	/**
	 * The send time for the winning version.
	 * Example: 2015-07-09T18:00:00+00:00.
	 */
	public string $sendTimeWinner;
	/**
	 * The size of the split groups. Campaigns split based on 'schedule' are forced to have a 50/50 split. Valid split integers are between 1-50. Ex. A 10% split would result in two groups of 10% of the subscribers plus a winner sending to the remaining 80%.
	 * Example: 50.
	 */
	public int $splitSize;
	/**
	 * The type of AB split to run ('subject', 'from_name', or 'schedule').
	 * Example: from_name.
	 */
	public string $splitTest;
	/**
	 * For campaigns split on 'Subject Line', the subject line for Group A.
	 * Example: Freddie Likes Jokes.
	 */
	public string $subjectA;
	/**
	 * For campaigns split on 'Subject Line', the subject line for Group B.
	 * Example: Freddie's Jokes for the week of *|DATE|*.
	 */
	public string $subjectB;
	/**
	 * The amount of time to wait before picking a winner. This cannot be changed after a campaign is sent.
	 * Example: 6.
	 */
	public int $waitTime;
	/**
	 * How unit of time for measuring the winner ('hours' or 'days'). This cannot be changed after a campaign is sent.
	 * Example: hours.
	 */
	public string $waitUnits;
}
