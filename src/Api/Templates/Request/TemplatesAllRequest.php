<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Templates\Request;

use DateTimeInterface;
use Stefna\Mailchimp\Api\Request\AllInterface;
use Stefna\Mailchimp\Api\Request\AllTrait;

class TemplatesAllRequest extends TemplatesRequest implements AllInterface
{
	use AllTrait;

	public const PARAM_EMAIL = 'email';
	public const PARAM_SINCE_CREATED_AT = 'since_created_at';
	public const PARAM_BEFORE_CREATED_AT = 'before_created_at';
	public const PARAM_TYPE = 'type';
	public const PARAM_FOLDER_ID = 'folder_id';

	public function setBeforeCreatedAt(DateTimeInterface|string $value): TemplatesAllRequest
	{
		if ($value instanceof DateTimeInterface) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data[self::PARAM_BEFORE_CREATED_AT] = (string)$value;
		return $this;
	}

	public function setSinceCreatedAt(DateTimeInterface|string $value): TemplatesAllRequest
	{
		if ($value instanceof DateTimeInterface) {
			$value = $value->format(DateTimeInterface::W3C);
		}
		$this->data[self::PARAM_SINCE_CREATED_AT] = (string)$value;
		return $this;
	}

	public function setType(string $value): void
	{
		$this->data[self::PARAM_TYPE] = $value;
	}

	public function setFolderId(string $value): TemplatesAllRequest
	{
		$this->data[self::PARAM_FOLDER_ID] = $value;
		return $this;
	}
}
