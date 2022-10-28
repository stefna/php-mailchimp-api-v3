<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Lists\Request;

use Stefna\Mailchimp\Other\AbstractRequest;

class ListsRequest extends AbstractRequest
{
	private const PARAM_FIELDS = 'fields';
	private const PARAM_EXCLUDE_FIELDS = 'exclude_fields';

	/**
	 * @param string[] $value
	 * @return $this
	 */
	public function setFields(array $value): ListsRequest
	{
		$this->data[self::PARAM_FIELDS] = $value;
		return $this;
	}

	/**
	 * @param string[] $value
	 * @return $this
	 */
	public function setExcludedFields(array $value): ListsRequest
	{
		$this->data[self::PARAM_EXCLUDE_FIELDS] = $value;
		return $this;
	}
}
