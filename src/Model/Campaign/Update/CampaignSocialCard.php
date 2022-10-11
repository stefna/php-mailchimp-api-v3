<?php

namespace Stefna\Mailchimp\Model\Campaign\Update;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSocialCard extends AbstractData
{
	/**
	 * A short summary of the campaign to display.
	 *
	 * @var string
	 */
	public $description;

	/**
	 * The url for the header image for the card.
	 *
	 * @var string
	 */
	public $imageUrl;

	/**
	 * The title for the card. Typically, the subject line of the campaign.
	 *
	 * @var string
	 */
	public $title;
}
