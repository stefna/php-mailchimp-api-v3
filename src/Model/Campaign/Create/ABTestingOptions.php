<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create;

use Stefna\Mailchimp\Other\AbstractData;

class ABTestingOptions extends AbstractData
{
	/**
	 * For campaigns split on 'From Name', the name for Group A.
	 */
	public string $fromNameA;
	/**
	 * For campaigns split on 'From Name', the name for Group B.
	 */
	public string $fromNameB;
	/**
	 * How we should evaluate a winner. Based on 'opens', 'clicks', or 'manual'.
	 */
	public string $pickWinner;
	/**
	 * For campaigns split on 'From Name', the reply-to address for Group A.
	 */
	public string $replyEmailA;
	/**
	 * For campaigns split on 'From Name', the reply-to address for Group B.
	 */
	public string $replyEmailB;
	/**
	 * The send time for Group A.
	 */
	public string $sendTimeA;
	/**
	 * The send time for Group B.
	 */
	public string $sendTimeB;
	/**
	 * The send time for the winning version.
	 */
	public string $sendTimeWinner;
	/**
	 * The size of the split groups. Campaigns split based on 'schedule' are forced to have a 50/50 split. Valid split integers are between 1-50.
	 */
	public int $splitSize;
	/**
	 * The type of AB split to run.
	 */
	public string $splitTest;
	/**
	 * For campaigns split on 'Subject Line', the subject line for Group A.
	 */
	public string $subjectA;
	/**
	 * For campaigns split on 'Subject Line', the subject line for Group B.
	 */
	public string $subjectB;
	/**
	 * The amount of time to wait before picking a winner. This cannot be changed after a campaign is sent.
	 */
	public int $waitTime;
	/**
	 * How unit of time for measuring the winner ('hours' or 'days'). This cannot be changed after a campaign is sent.
	 */
	public string $waitUnits;
}
