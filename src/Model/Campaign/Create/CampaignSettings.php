<?php

namespace Stefna\Mailchimp\Model\Campaign\Create;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSettings extends AbstractData
{
	/**
	 * Whether MailChimp [authenticated](http://kb.mailchimp.com/delivery/deliverability-research/set-up-mailchimp-authentication?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) the campaign. Defaults to `true`.
	 *
	 * @var bool
	 */
	public $authenticate;

	/**
	 * An array of [Facebook](http://kb.mailchimp.com/integrations/facebook/integrate-facebook-with-mailchimp?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) page ids to auto-post to.
	 *
	 * @var string[]
	 */
	public $autoFbPost;

	/**
	 * Automatically append MailChimp's [default footer](http://kb.mailchimp.com/campaigns/design/theres-a-gray-footer-added-to-my-campaign?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) to the campaign.
	 *
	 * @var bool
	 */
	public $autoFooter;

	/**
	 * Automatically tweet a link to the [campaign archive](http://kb.mailchimp.com/campaigns/archives/set-up-your-campaign-archive?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) page when the campaign is sent.
	 *
	 * @var bool
	 */
	public $autoTweet;

	/**
	 * Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to `true`.
	 *
	 * @var bool
	 */
	public $fbComments;

	/**
	 * If the campaign is listed in a folder, the id for that folder.
	 *
	 * @var string
	 */
	public $folderId;

	/**
	 * The 'from' name on the campaign (not an email address).
	 *
	 * @var string
	 */
	public $fromName;

	/**
	 * Automatically inline the CSS included with the campaign content.
	 *
	 * @var bool
	 */
	public $inlineCss;

	/**
	 * The reply-to email address for the campaign.
	 *
	 * @var string
	 */
	public $replyTo;

	/**
	 * The subject line for the campaign.
	 *
	 * @var string
	 */
	public $subjectLine;

	/**
	 * The title of the campaign.
	 *
	 * @var string
	 */
	public $title;

	/**
	 * The campaign's custom 'To' name. Typically, the first name [merge field](http://kb.mailchimp.com/merge-tags/using/getting-started-with-merge-tags?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 *
	 * @var string
	 */
	public $toName;

	/**
	 * Use MailChimp Conversation feature to manage out-of-office replies.
	 *
	 * @var bool
	 */
	public $useConversation;
}
