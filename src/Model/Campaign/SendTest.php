<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class SendTest extends AbstractData
{
	/**
	 * An array of email addresses to send the test email to.
	 *
	 * @var string[]
	 */
	public array $testEmails;
	/**
	 * Choose the type of test email to send.
	 * Enum: ['html', 'plaintext']
	 */
	public string $sendType;
}
