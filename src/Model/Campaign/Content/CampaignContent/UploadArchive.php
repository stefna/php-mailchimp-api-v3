<?php

namespace Stefna\Mailchimp\Model\Campaign\Content\CampaignContent;

use Stefna\Mailchimp\Other\AbstractData;

class UploadArchive extends AbstractData
{
	/**
	 * The base64-encoded representation of the archive file.
	 *
	 * @var string
	 */
	public $archiveContent;

	/**
	 * The type of encoded file. Defaults to zip.
	 *
	 * @var string
	 */
	public $archiveType;
}
