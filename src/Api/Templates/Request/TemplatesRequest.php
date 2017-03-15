<?php

namespace Stefna\Mailchimp\Api\Templates\Request;

use Stefna\Mailchimp\Other\AbstractRequest;

class TemplatesRequest extends AbstractRequest
{
	const PARAM_FIELDS = 'fields';
	const PARAM_EXCLUDE_FIELDS = 'exclude_fields';

	public function setFields(array $value)
	{
		$this->data[self::PARAM_FIELDS] = $value;
		return $this;
	}

	public function setExcludedFields(array $value)
	{
		$this->data[self::PARAM_EXCLUDE_FIELDS] = $value;
		return $this;
	}

}
