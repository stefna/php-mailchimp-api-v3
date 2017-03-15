<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSocialCard extends AbstractData
{
	/**
	 * A short summary of the campaign to display.
	 * Example: Freddie's Weeekly Jokes.
	 *
	 * @var string
	 */
	public $description;

	/**
	 * The url for the header image for the card.
	 * Example: http://kb.mailchimp.com/images/freddie.svg.
	 *
	 * @var string
	 */
	public $imageUrl;

	/**
	 * The title for the card. Typically the subject line of the campaign.
	 * Example: Freddie Likes Jokes.
	 *
	 * @var string
	 */
	public $title;
}
