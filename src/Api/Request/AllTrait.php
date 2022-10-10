<?php

namespace Stefna\Mailchimp\Api\Request;

trait AllTrait
{
	protected string $paramCount = 'count';
	protected string $paramOffset = 'offset';

	public function setCount(int $value)
	{
		$this->data[$this->paramCount] = $value;
		return $this;
	}

	public function setOffset(int $value)
	{
		$this->data[$this->paramOffset] = $value;
		return $this;
	}

}
