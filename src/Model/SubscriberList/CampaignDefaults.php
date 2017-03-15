<?php

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignDefaults extends AbstractData
{
	/**
	 * The default from email (must be a valid email address) for campaigns sent to this list.
	 * Example: freddie@freddiesjokes.com.
	 *
	 * @var string
	 */
	public $fromEmail;

	/**
	 * The default from name for campaigns sent to this list.
	 * Example: Freddie.
	 *
	 * @var string
	 */
	public $fromName;

	/**
	 * The default language for this lists's forms.
	 * Example: en.
	 *
	 * @var string
	 */
	public $language;

	/**
	 * The default subject line for campaigns sent to this list.
	 * Example: Freddie Likes Jokes.
	 *
	 * @var string
	 */
	public $subject;
}
