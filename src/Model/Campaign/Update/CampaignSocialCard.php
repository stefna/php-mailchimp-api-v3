<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Update;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignSocialCard extends AbstractData
{
	/**
	 * The url for the header image for the card.
	 */
	public string $imageUrl;

	/**
	 * The title for the card. Typically, the subject line of the campaign.
	 */
	public string $title;
}
