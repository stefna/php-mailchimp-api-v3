<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Model\Template;

use Stefna\Mailchimp\Other\AbstractData;

class TemplateInstance extends AbstractData
{
	/**
	 * User templates are not 'deleted,' but rather marked as 'inactive.' Returns whether the template is still active.
	 *
	 * @var bool
	 */
	public bool $active;

	/**
	 * If available, the category the template is listed in.
	 *
	 * @var string
	 */
	public string $category;

	/**
	 * The login name for template's creator.
	 *
	 * @var string
	 */
	public string $createdBy;

	/**
	 * The date and time the template was created.
	 *
	 * @var string
	 */
	public string $dateCreated;

	/**
	 * Whether the template uses the drag and drop editor.
	 *
	 * @var bool
	 */
	public bool $dragAndDrop;

	/**
	 * The id of the folder the template is currently in.
	 *
	 * @var string|null
	 */
	public ?string $folderId = null;

	/**
	 * The individual id for the template.
	 *
	 * @var int
	 */
	public int $id;

	/**
	 * The name of the template.
	 *
	 * @var string
	 */
	public string $name;

	/**
	 * Whether the template contains media queries to make it responsive.
	 *
	 * @var bool
	 */
	public bool $responsive;

	/**
	 * The URL used for [template sharing](http://kb.mailchimp.com/templates/basic-and-themes/how-to-share-a-template?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
	 *
	 * @var string
	 */
	public string $shareUrl;

	/**
	 * If available, the URL for a thumbnail of the template.
	 *
	 * @var string
	 */
	public string $thumbnail;

	/**
	 * The type of template (user, base, or gallery).
	 *
	 * @var string
	 */
	public string $type;
}
