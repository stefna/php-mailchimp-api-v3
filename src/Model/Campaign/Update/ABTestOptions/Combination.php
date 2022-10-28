<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Update\ABTestOptions;

use Stefna\Mailchimp\Other\AbstractData;

class Combination extends AbstractData
{
	/**
	 * Unique ID for the combination.
	 */
	public string $id;
	/**
	 * The index of variate_settings.subject_lines used.
	 */
	public int $subjectLine;
	/**
	 * The index of variate_settings.send_times used.
	 */
	public int $sendTime;
	/**
	 * The index of variate_settings.from_names used.
	 */
	public int $fromName;
	/**
	 * The index of variate_settings.reply_to_addresses used.
	 */
	public int $replyTo;
	/**
	 * The index of variate_settings.contents used.
	 */
	public int $contentDescription;
	/**
	 * The number of recipients for this combination.
	 */
	public int $recipients;
}
