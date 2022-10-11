<?php

namespace Stefna\Mailchimp\Model\Template;

use Stefna\Mailchimp\Other\AbstractData;

class NewTemplateInstance extends AbstractData
{
	/**
	 * The name of the template.
	 * Example: Freddie's Jokes
	 *
	 * @var string
	 */
	public string $name;

	/**
	 * The id of the folder the template is currently in.
	 * Example: a4b830b
	 *
	 * @var string
	 */
	public string $folderId;

	/**
	 * The raw HTML for the template. We  support the MailChimp [Template Language](http://kb.mailchimp.com/templates/code/getting-started-with-mailchimps-template-language?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) in any HTML code passed via the API.
	 *
	 * @var string
	 */
	public string $html;
}
