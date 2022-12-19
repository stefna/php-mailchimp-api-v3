<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Model\SubscriberList\ListMergeFields;

use Stefna\Mailchimp\Other\AbstractData;

class Options extends AbstractData
{
	/**
	 * In an address field, the default country code if none supplied.
	 */
	public int $defaultCountry;
	/**
	 * In a phone field, the phone number type: US or International.
	 */
	public string $phoneFormat;
	/**
	 * In a date or birthday field, the format of the date.
	 */
	public string $dateFormat;
	/**
	 * In a radio or dropdown non-group field, the available options for contacts to pick from.
	 * @var string[]
	 */
	public array $choices;
	/**
	 * In a text field, the default length of the text field.
	 */
	public int $size;
}
