<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\SendChecklist;

use Stefna\Mailchimp\Other\AbstractData;

class Item extends AbstractData
{
	/**
	 * The item type.
	 * Enum: ["success", "warning", "error"]
	 */
	public string $type;
	/**
	 * The ID for the specific item.
	 */
	public int $id;
	/**
	 * The heading for the specific item.
	 */
	public string $heading;
	/**
	 * Details about the specific feedback item.
	 */
	public string $details;
}
