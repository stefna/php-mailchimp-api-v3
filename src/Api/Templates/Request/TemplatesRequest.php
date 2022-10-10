<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Templates\Request;

use Stefna\Mailchimp\Other\AbstractRequest;

class TemplatesRequest extends AbstractRequest
{
	const PARAM_FIELDS = 'fields';
	const PARAM_EXCLUDE_FIELDS = 'exclude_fields';

	/**
	 * @param string[] $value
	 * @return $this
	 */
	public function setFields(array $value): TemplatesRequest
	{
		$this->data[self::PARAM_FIELDS] = $value;
		return $this;
	}

	/**
	 * @param string[] $value
	 * @return $this
	 */
	public function setExcludedFields(array $value): TemplatesRequest
	{
		$this->data[self::PARAM_EXCLUDE_FIELDS] = $value;
		return $this;
	}
}
