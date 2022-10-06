<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class ABTestOptions extends AbstractData
{
	/**
	 * Combinations of possible variables that were used to build emails.
	 * NOT IN https://mailchimp.com/developer/marketing/api/campaigns/update-campaign-settings/
	 */
	//public $combinations;

	/**
	 * Descriptions of possible email contents.
	 * NOT IN https://mailchimp.com/developer/marketing/api/campaigns/update-campaign-settings/
	 */
	//public $contents;

	/**
	 * Possible from names.
	 *
	 * @var string[]
	 */
	public $fromNames;

	/**
	 * Possible reply To addresses.
	 *
	 * @var string[]
	 */
	public $replyToAddresses;

	/**
	 * Possible send times.
	 *
	 * @var string[]
	 */
	public $sendTimes;

	/**
	 * Possible subject lines.
	 *
	 * @var string[]
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
