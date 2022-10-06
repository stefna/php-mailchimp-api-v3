<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSettings extends AbstractData
{
	/**
	 * Whether or not the campaign was authenticated by MailChimp. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $authenticate;

	/**
	 * An array of Facebook page ids to auto-post to.
	 *
	 * @var string[]
	 */
	public $autoFbPost;

	/**
	 * Automatically append MailChimp's default footer to the campaign.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $autoFooter;

	/**
	 * Automatically tweet a link to the campaign archive page when the campaign is sent.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $autoTweet;

	/**
	 * Whether the campaign uses the drag-and-drop editor.
	 *
	 * @var bool
	 */
	public $dragAndDrop;

	/**
	 * Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $fbComments;

	/**
	 * If the campaign is listed in a folder, the id for that folder.
	 * Example: a0ced505.
	 *
	 * @var string
	 */
	public $folderId;

	/**
	 * The 'from' name on the campaign (not an email address).
	 * Example: Urist McVankab.
	 *
	 * @var string
	 */
	public $fromName;

	/**
	 * Automatically inline the CSS included with the campaign content.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $inlineCss;

	/**
	 * The reply-to email address for the campaign.
	 * Example: urist.mcvankab@freddiesjokes.com.
	 *
	 * @var string
	 */
	public $replyTo;

	/**
	 * The subject line for the campaign.
	 * Example: Freddie Likes Jokes.
	 *
	 * @var string
	 */
	public $subjectLine;

	/**
	 * The id for the template used in this campaign.
	 * Example: 9001.
	 *
	 * @var int
	 */
	public $templateId;

	/**
	 * Send this campaign using 'timewarp.' For more info, see the Knowledge Base article: http://eepurl.com/iAgs.
	 *
	 * @var bool
	 */
	public $timewarp;

	/**
	 * The title of the campaign.
	 * Example: Freddie Weekly Jokes.
	 *
	 * @var string
	 */
	public $title;

	/**
	 * The campaign's custom 'to' name. Typically something like the first name merge var.
	 * Example: *|FNAME|*.
	 *
	 * @var string
	 */
	public $toName;

	/**
	 * Use MailChimp Conversation feature to manage out of office replies.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public $useConversation;
}
