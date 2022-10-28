<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList\ListMembers;

use Stefna\Mailchimp\Other\AbstractData;

class Notes extends AbstractData
{
	/**
	 * The date and time the note was created.
	 */
	public string $createdAt;

	/**
	 * The author of the note.
	 */
	public string $createdBy;

	/**
	 * The content of the note.
	 */
	public string $note;

	/**
	 * The note id.
	 */
	public int $noteId;
}
