<?php

namespace Stefna\Mailchimp\Model\Campaign\SendChecklist;

use Stefna\Mailchimp\Other\AbstractData;

class Item extends AbstractData
{
	/**
	 * The item type.
	 * Enum: ["success", "warning", "error"]
	 *
	 * @var string
	 */
	public $type;
	/**
	 * The ID for the specific item.
	 *
	 * @var int
	 */
	public $id;
	/**
	 * The heading for the specific item.
	 *
	 * @var string
	 */
	public $heading;
	/**
	 * Details about the specific feedback item.
	 *
	 * @var string
	 */
	public $details;
}
