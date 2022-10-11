<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Update\ABTestOptions;

use Stefna\Mailchimp\Other\AbstractData;

class Combination extends AbstractData
{
	/**
	 * Unique ID for the combination.
	 * @var string $id
	 */
	public string $id;

	/**
	 * The index of variate_settings.subject_lines used.
	 * @var int $subjectLine
	 */
	public int $subjectLine;

	/**
	 * The index of variate_settings.send_times used.
	 * @var int $sendTime
	 */
	public int $sendTime;

	/**
	 * The index of variate_settings.from_names used.
	 * @var int $fromName
	 */
	public int $fromName;

	/**
	 * The index of variate_settings.reply_to_addresses used.
	 * @var int $replyTo
	 */
	public int $replyTo;

	/**
	 * The index of variate_settings.contents used.
	 * @var int $contentDescription
	 */
	public int $contentDescription;

	/**
	 * The number of recipients for this combination.
	 * @var int $recipients
	 */
	public int $recipients;
}