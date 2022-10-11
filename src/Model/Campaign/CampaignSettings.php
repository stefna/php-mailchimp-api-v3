<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSettings extends AbstractData
{
	/**
	 * Whether the campaign was authenticated by MailChimp. Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $authenticate;

	/**
	 * An array of Facebook page ids to auto-post to.
	 *
	 * @var string[]
	 */
	public array $autoFbPost;

	/**
	 * Automatically append MailChimp's default footer to the campaign.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $autoFooter;

	/**
	 * Automatically tweet a link to the campaign archive page when the campaign is sent.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $autoTweet;

	/**
	 * Whether the campaign uses the drag-and-drop editor.
	 *
	 * @var bool
	 */
	public bool $dragAndDrop;

	/**
	 * Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to 'true'.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $fbComments;

	/**
	 * If the campaign is listed in a folder, the id for that folder.
	 * Example: a0ced505.
	 *
	 * @var string
	 */
	public string $folderId;

	/**
	 * The 'from' name on the campaign (not an email address).
	 * Example: Urist McVankab.
	 *
	 * @var string
	 */
	public string $fromName;

	/**
	 * Automatically inline the CSS included with the campaign content.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $inlineCss;

	/**
	 * The reply-to email address for the campaign.
	 * Example: urist.mcvankab@freddiesjokes.com.
	 *
	 * @var string
	 */
	public string $replyTo;

	/**
	 * The subject line for the campaign.
	 * Example: Freddie Likes Jokes.
	 *
	 * @var string
	 */
	public string $subjectLine;

	/**
	 * The id for the template used in this campaign.
	 * Example: 9001.
	 *
	 * @var int
	 */
	public int $templateId;

	/**
	 * Send this campaign using 'timewarp.' For more info, see the Knowledge Base article: http://eepurl.com/iAgs.
	 *
	 * @var bool
	 */
	public bool $timewarp;

	/**
	 * The title of the campaign.
	 * Example: Freddie Weekly Jokes.
	 *
	 * @var string
	 */
	public string $title;

	/**
	 * The campaign's custom 'to' name. Typically, something like the first name merge var.
	 * Example: *|FNAME|*.
	 *
	 * @var string
	 */
	public string $toName;

	/**
	 * Use MailChimp Conversation feature to manage out of office replies.
	 * Example: 1.
	 *
	 * @var bool
	 */
	public bool $useConversation;
}
