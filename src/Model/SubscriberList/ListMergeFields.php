<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList;

use Stefna\Mailchimp\Model\SubscriberList\ListMergeFields\Options;
use Stefna\Mailchimp\Other\AbstractData;

class ListMergeFields extends AbstractData
{
	/**
	 * An unchanging id for the merge field.
	 */
	public int $mergeId;
	/**
	 * The merge tag used for Mailchimp campaigns and adding contact information.
	 * https://mailchimp.com/developer/marketing/docs/merge-fields/#add-merge-data-to-contacts
	 */
	public string $tag;
	/**
	 * The name of the merge field (audience field).
	 */
	public string $name;
	/**
	 * The type for the merge field. Possible values: "text", "number", "address", "phone", "date", "url", "imageurl", "radio", "dropdown", "birthday", or "zip".
	 */
	public string $type;
	/**
	 * The boolean value if the merge field is required.
	 */
	public bool $required;
	/**
	 * The default value for the merge field if null.
	 */
	public string $defaultValue;
	/**
	 * Whether the merge field is displayed on the signup form.
	 */
	public bool $public;
	/**
	 * The order that the merge field displays on the list signup form.
	 */
	public int $displayOrder;
	/**
	 * Extra options for some merge field types.
	 */
	public Options $options;
	/**
	 * Extra text to help the subscriber fill out the form.
	 */
	public string $helpText;
	/**
	 * The ID that identifies this merge field's audience.
	 */
	public string $listId;
	protected array $classMap = [
		'options' => Options::class,
	];
}
