<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignDefaults extends AbstractData
{
	/**
	 * The default from email (must be a valid email address) for campaigns sent to this list.
	 * Example: freddie@freddiesjokes.com.
	 */
	public string $fromEmail;
	/**
	 * The default from name for campaigns sent to this list.
	 * Example: Freddie.
	 */
	public string $fromName;
	/**
	 * The default language for these lists forms.
	 * Example: en.
	 */
	public string $language;
	/**
	 * The default subject line for campaigns sent to this list.
	 * Example: Freddie Likes Jokes.
	 */
	public string $subject;
}
