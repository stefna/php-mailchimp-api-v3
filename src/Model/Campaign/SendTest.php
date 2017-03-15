<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class SendTest extends AbstractData
{
	/**
	 * An array of email addresses to send the test email to.
	 *
	 * @var array
	 */
	public $testEmails;

	/**
	 * Choose the type of test email to send.
	 * Enum: ['html', 'plaintext']
	 *
	 * @var string
	 */
	public $sendType;
}
