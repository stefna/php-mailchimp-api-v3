<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Template;

use Stefna\Mailchimp\Other\AbstractData;

class TemplateInstance extends AbstractData
{
	/**
	 * User templates are not 'deleted,' but rather marked as 'inactive.' Returns whether the template is still active.
	 */
	public bool $active;
	/**
	 * If available, the category the template is listed in.
	 */
	public string $category;
	/**
	 * The login name for template's creator.
	 */
	public string $createdBy;
	/**
	 * The date and time the template was created.
	 */
	public string $dateCreated;
	/**
	 * Whether the template uses the drag and drop editor.
	 */
	public bool $dragAndDrop;
	/**
	 * The id of the folder the template is currently in.
	 */
	public ?string $folderId = null;
	/**
	 * The individual id for the template.
	 */
	public int $id;
	/**
	 * The name of the template.
	 */
	public string $name;
	/**
	 * Whether the template contains media queries to make it responsive.
	 */
	public bool $responsive;
	/**
	 * The URL used for [template sharing](http://kb.mailchimp.com/templates/basic-and-themes/how-to-share-a-template?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 */
	public string $shareUrl;
	/**
	 * If available, the URL for a thumbnail of the template.
	 */
	public string $thumbnail;
	/**
	 * The type of template (user, base, or gallery).
	 */
	public string $type;
}
