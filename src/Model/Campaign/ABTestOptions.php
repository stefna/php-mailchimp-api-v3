<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class ABTestOptions extends AbstractData
{
	/**
	 * Combinations of possible variables that were used to build emails.
	 *
	 * @var array
	 */
	public $combinations;

	/**
	 * Descriptions of possible email contents.
	 *
	 * @var array
	 */
	public $contents;

	/**
	 * Possible from names.
	 *
	 * @var array
	 */
	public $fromNames;

	/**
	 * Possible reply To addresses.
	 *
	 * @var array
	 */
	public $replyToAddresses;

	/**
	 * Possible send times.
	 *
	 * @var array
	 */
	public $sendTimes;

	/**
	 * Possible subject lines.
	 *
	 * @var array
	 */
	public $subjectLines;

	/**
	 * The percentage of subscribers to send the test combinations to, from 10 to 100.
	 *
	 * @var int
	 */
	public $testSize;

	/**
	 * The number of minutes to wait before the winning campaign is picked.
	 *
	 * @var int
	 */
	public $waitTime;

	/**
	 * How the winning campaign will be chosen.
	 *
	 * @var string
	 */
	public $winnerCriteria;

	/**
	 * ID of the campaign that was sent to the remaining recipients based on the winning combination.
	 *
	 * @var string
	 */
	public $winningCampaignId;

	/**
	 * ID of the combination that was chosen as the winner.
	 *
	 * @var string
	 */
	public $winningCombinationId;
}
