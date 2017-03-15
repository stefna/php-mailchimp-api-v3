<?php

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class Notes extends AbstractData
{
	/**
	 * The date and time the note was created.
	 *
	 * @var string
	 */
	public $createdAt;

	/**
	 * The author of the note.
	 *
	 * @var string
	 */
	public $createdBy;

	/**
	 * The content of the note.
	 *
	 * @var string
	 */
	public $note;

	/**
	 * The note id.
	 *
	 * @var int
	 */
	public $noteId;
}
