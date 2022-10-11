<?php

namespace Stefna\Mailchimp\Model\Campaign;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSocialCard extends AbstractData
{
	/**
	 * A short summary of the campaign to display.
	 * Example: Freddie's Weekly Jokes.
	 *
	 * @var string
	 */
	public string $description;

	/**
	 * The url for the header image for the card.
	 * Example: http://kb.mailchimp.com/images/freddie.svg.
	 *
	 * @var string
	 */
	public string $imageUrl;

	/**
	 * The title for the card. Typically, the subject line of the campaign.
	 * Example: Freddie Likes Jokes.
	 *
	 * @var string
	 */
	public string $title;
}
