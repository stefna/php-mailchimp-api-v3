<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model;

use Stefna\Mailchimp\Model\SubscriberList\CampaignDefaults;
use Stefna\Mailchimp\Model\SubscriberList\ListContact;
use Stefna\Mailchimp\Model\SubscriberList\Statistics;
use Stefna\Mailchimp\Other\AbstractData;

class SubscriberList extends AbstractData
{
	/**
	 * The email address to use for this list's Email Beamer.
	 * Example: us2-9b602xxx-c99b669xxx@inbound.mailchimp.com.
	 */
	public string $beamerAddress;
	/**
	 * Default values for campaigns created for this list.
	 */
	public CampaignDefaults $campaignDefaults;
	/**
	 * Displayed in campaign footers to comply with international spam laws.
	 */
	public ListContact $contact;
	/**
	 * The date and time that this list was created.
	 * Example: 2013-01-16T14:22:36+00:00.
	 */
	public string $dateCreated;
	/**
	 * Whether the list supports multiple formats for emails.
	 * Example: 1.
	 */
	public bool $emailTypeOption;
	/**
	 * A string that uniquely identifies this list
	 * Example: 4ca5becb8d.
	 */
	public string $id;
	/**
	 * An auto-generated activity score for the list (0-5).
	 * Example: 4.
	 */
	public int $listRating;
	/**
	 * Any list-specific modules installed for this list.
	 *
	 * @var string[]
	 */
	public array $modules;
	/**
	 * The name of the list.
	 * Example: Freddie's Weekly Jokes List.
	 */
	public string $name;
	/**
	 * The email address to send subscribe notifications to, when enabled.
	 * Example: freddie@freddiesjokes.com.
	 */
	public string $notifyOnSubscribe;
	/**
	 * The email address to send unsubscribe notifications to, when enabled.
	 * Example: freddie@freddiesjokes.com.
	 */
	public string $notifyOnUnsubscribe;
	/**
	 * The permission reminder for the list: a line of text that appears in the footer of each campaign that explains why subscribers are receiving the email campaign.
	 * Example: You’re receiving this email because you signed up for weekly jokes from Freddie.
	 */
	public string $permissionReminder;
	/**
	 * Various stats and counts for the list. Many of these are cached for at least five minutes.
	 */
	public Statistics $stats;
	/**
	 * The full version of this list's subscribe form (host will vary).
	 * Example: http://freddiesjokes.us2.list-manage.com/subscribe?u=8d3a3db4d97663a9074xxxx16&id=4ca5becb8d.
	 */
	public string $subscribeUrlLong;
	/**
	 * Our eepurl shortened version of this list's subscribe form.
	 * Example: http://eepurl.com/bsRxxx.
	 */
	public string $subscribeUrlShort;
	/**
	 * Whether campaigns for this list use the Archive Bar in archives by default.
	 * Example: 1.
	 */
	public bool $useArchiveBar;
	/**
	 * Whether this list is public (pub) or private (prv). Used internally for projects like Wavelength.
	 * Example: pub.
	 */
	public string $visibility;
	protected array $classMap = [
		'contact' => ListContact::class,
		'campaignDefaults' => CampaignDefaults::class,
		'stats' => Statistics::class,
	];
}
