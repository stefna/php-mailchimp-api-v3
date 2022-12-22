<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSettings extends AbstractData
{
	/**
	 * Whether the campaign was authenticated by MailChimp. Defaults to 'true'.
	 * Example: 1.
	 */
	public bool $authenticate;
	/**
	 * An array of Facebook page ids to auto-post to.
	 *
	 * @var string[]
	 */
	public ?array $autoFbPost = null;
	/**
	 * Automatically append MailChimp's default footer to the campaign.
	 * Example: 1.
	 */
	public bool $autoFooter;
	/**
	 * Automatically tweet a link to the campaign archive page when the campaign is sent.
	 * Example: 1.
	 */
	public bool $autoTweet;
	/**
	 * Whether the campaign uses the drag-and-drop editor.
	 */
	public bool $dragAndDrop;
	/**
	 * Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to 'true'.
	 * Example: 1.
	 */
	public bool $fbComments;
	/**
	 * If the campaign is listed in a folder, the id for that folder.
	 * Example: a0ced505.
	 */
	public string $folderId;
	/**
	 * The 'from' name on the campaign (not an email address).
	 * Example: Urist McVankab.
	 */
	public ?string $fromName = null;
	/**
	 * Automatically inline the CSS included with the campaign content.
	 * Example: 1.
	 */
	public bool $inlineCss;
	/**
	 * The reply-to email address for the campaign.
	 * Example: urist.mcvankab@freddiesjokes.com.
	 */
	public ?string $replyTo = null;
	/**
	 * The subject line for the campaign.
	 * Example: Freddie Likes Jokes.
	 */
	public ?string $subjectLine = null;
	/**
	 * The id for the template used in this campaign.
	 * Example: 9001.
	 */
	public int $templateId;
	/**
	 * Send this campaign using 'timewarp.' For more info, see the Knowledge Base article: http://eepurl.com/iAgs.
	 */
	public bool $timewarp;
	/**
	 * The title of the campaign.
	 * Example: Freddie Weekly Jokes.
	 */
	public string $title;
	/**
	 * The campaign's custom 'to' name. Typically, something like the first name merge var.
	 * Example: *|FNAME|*.
	 */
	public string $toName;
	/**
	 * Use MailChimp Conversation feature to manage out of office replies.
	 * Example: 1.
	 */
	public bool $useConversation;
}
