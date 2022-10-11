<?php

namespace Stefna\Mailchimp\Model\Campaign\Update;

use Stefna\Mailchimp\Other\AbstractData;

class CampaignList extends AbstractData
{
	/**
	 * The unique list id.
	 *
	 * @var string
	 */
	public string $listId;
}
