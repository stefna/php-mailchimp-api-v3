<?php

namespace Stefna\Mailchimp\Api\Lists\Request;

use Stefna\Mailchimp\Other\AbstractRequest;

class ListsRequest extends AbstractRequest
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
