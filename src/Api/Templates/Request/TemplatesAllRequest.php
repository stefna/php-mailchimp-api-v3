<?php

namespace Stefna\Mailchimp\Api\Templates\Request;

use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Api\Request\AllTrait;

class TemplatesAllRequest extends TemplatesRequest implements AllInterface
{
	use AllTrait;

	const PARAM_EMAIL = 'email';
	const PARAM_SINCE_CREATED_AT = 'since_created_at';
	const PARAM_BEFORE_CREATED_AT = 'before_created_at';
	const PARAM_TYPE = 'type';
	const PARAM_FOLDER_ID = 'folder_id';

	/**
	 * @param \DateTime|string $value
	 * @return $this
	 */
	public function setBeforeCreatedAt($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data[self::PARAM_BEFORE_CREATED_AT] = (string)$value;
		return $this;
	}

	/**
	 * @param \DateTime|string $value
	 * @return $this
	 */
	public function setSinceCreatedAt($value)
	{
		if ($value instanceof \DateTime) {
			$value = $value->format(\DateTime::W3C);
		}
		$this->data[self::PARAM_SINCE_CREATED_AT] = (string)$value;
		return $this;
	}

	public function setType($value)
	{
		$this->data[self::PARAM_TYPE] = (string)$value;
		return $this;
	}

	public function setFolderId($value)
	{
		$this->data[self::PARAM_FOLDER_ID] = (string)$value;
		return $this;
	}
}
