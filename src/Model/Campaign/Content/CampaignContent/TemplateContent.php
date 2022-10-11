<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Campaign\Content\CampaignContent;

use Stefna\Mailchimp\Other\AbstractData;

class TemplateContent extends AbstractData
{
	/**
	 * The id of the template to use.
	 *
	 * @var int
	 */
	public int $id;

	/**
	 * Content for the sections of the template. Each key should be the unique [mc:edit area](http://kb.mailchimp.com/templates/code/create-editable-content-areas-with-mailchimps-template-language?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) name from the template.
	 *
	 * @var string[]
	 */
	public array $sections;
}
