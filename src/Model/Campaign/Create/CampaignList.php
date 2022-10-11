<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Create;

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
