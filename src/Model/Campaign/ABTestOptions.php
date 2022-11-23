<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class ABTestOptions extends AbstractData
{
	/**
	 * Possible from names.
	 *
	 * @var string[]
	 */
	public array $fromNames;
	/**
	 * Possible reply To addresses.
	 *
	 * @var string[]
	 */
	public array $replyToAddresses;
	/**
	 * Possible send times.
	 *
	 * @var string[]
	 */
	public array $sendTimes;
	/**
	 * Possible subject lines.
	 *
	 * @var string[]
	 */
	public array $subjectLines;
	/**
	 * The percentage of subscribers to send the test combinations to, from 10 to 100.
	 */
	public int $testSize;
	/**
	 * The number of minutes to wait before the winning campaign is picked.
	 */
	public int $waitTime;
	/**
	 * How the winning campaign will be chosen.
	 */
	public string $winnerCriteria;
	/**
	 * ID of the campaign that was sent to the remaining recipients based on the winning combination.
	 */
	public string $winningCampaignId;
	/**
	 * ID of the combination that was chosen as the winner.
	 */
	public string $winningCombinationId;
}
