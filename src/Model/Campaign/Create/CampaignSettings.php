<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSettings extends AbstractData
{
	/**
	 * Whether MailChimp [authenticated](http://kb.mailchimp.com/delivery/deliverability-research/set-up-mailchimp-authentication?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) the campaign. Defaults to `true`.
	 */
	public bool $authenticate;
	/**
	 * An array of [Facebook](http://kb.mailchimp.com/integrations/facebook/integrate-facebook-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) page ids to auto-post to.
	 *
	 * @var string[]
	 */
	public array $autoFbPost;
	/**
	 * Automatically append MailChimp's [default footer](http://kb.mailchimp.com/campaigns/design/theres-a-gray-footer-added-to-my-campaign?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) to the campaign.
	 */
	public bool $autoFooter;
	/**
	 * Automatically tweet a link to the [campaign archive](http://kb.mailchimp.com/campaigns/archives/set-up-your-campaign-archive?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) page when the campaign is sent.
	 */
	public bool $autoTweet;
	/**
	 * Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to `true`.
	 */
	public bool $fbComments;
	/**
	 * If the campaign is listed in a folder, the id for that folder.
	 */
	public string $folderId;
	/**
	 * The 'from' name on the campaign (not an email address).
	 */
	public string $fromName;
	/**
	 * Automatically inline the CSS included with the campaign content.
	 */
	public bool $inlineCss;
	/**
	 * The reply-to email address for the campaign.
	 */
	public string $replyTo;
	/**
	 * The subject line for the campaign.
	 */
	public string $subjectLine;
	/**
	 * The title of the campaign.
	 */
	public string $title;
	/**
	 * The campaign's custom 'To' name. Typically, the first name [merge field](http://kb.mailchimp.com/merge-tags/using/getting-started-with-merge-tags?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 */
	public string $toName;
	/**
	 * Use MailChimp Conversation feature to manage out-of-office replies.
	 */
	public bool $useConversation;
}
