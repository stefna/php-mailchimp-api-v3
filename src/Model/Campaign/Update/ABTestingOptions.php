<?php

namespace Stefna\Mailchimp\Model\Campaign\Update;

use Stefna\Mailchimp\Other\AbstractData;

class ABTestingOptions extends AbstractData
{
	/**
	 * For campaigns split on 'From Name', the name for Group A.
	 *
	 * @var string
	 */
	public $fromNameA;

	/**
	 * For campaigns split on 'From Name', the name for Group B.
	 *
	 * @var string
	 */
	public $fromNameB;

	/**
	 * How we should evaluate a winner. Based on 'opens', 'clicks', or 'manual'.
	 *
	 * @var string
	 */
	public $pickWinner;

	/**
	 * For campaigns split on 'From Name', the reply-to address for Group A.
	 *
	 * @var string
	 */
	public $replyEmailA;

	/**
	 * For campaigns split on 'From Name', the reply-to address for Group B.
	 *
	 * @var string
	 */
	public $replyEmailB;

	/**
	 * The send time for Group A.
	 *
	 * @var string
	 */
	public $sendTimeA;

	/**
	 * The send time for Group B.
	 *
	 * @var string
	 */
	public $sendTimeB;

	/**
	 * The send time for the winning version.
	 *
	 * @var string
	 */
	public $sendTimeWinner;

	/**
	 * The size of the split groups. Campaigns split based on 'schedule' are forced to have a 50/50 split. Valid split integers are between 1-50.
	 *
	 * @var int
	 */
	public $splitSize;

	/**
	 * The type of AB split to run.
	 *
	 * @var string
	 */
	public $splitTest;

	/**
	 * For campaigns split on 'Subject Line', the subject line for Group A.
	 *
	 * @var string
	 */
	public $subjectA;

	/**
	 * For campaigns split on 'Subject Line', the subject line for Group B.
	 *
	 * @var string
	 */
	public $subjectB;

	/**
	 * The amount of time to wait before picking a winner. This cannot be changed after a campaign is sent.
	 *
	 * @var int
	 */
	public $waitTime;

	/**
	 * How unit of time for measuring the winner ('hours' or 'days'). This cannot be changed after a campaign is sent.
	 *
	 * @var string
	 */
	public $waitUnits;
}
