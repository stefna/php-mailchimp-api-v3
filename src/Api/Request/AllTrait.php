<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Request;

trait AllTrait
{
	protected string $paramCount = 'count';
	protected string $paramOffset = 'offset';

	public function setCount(int $value): void
	{
		$this->data[$this->paramCount] = $value;
	}

	public function setOffset(int $value): void
	{
		$this->data[$this->paramOffset] = $value;
	}
}
