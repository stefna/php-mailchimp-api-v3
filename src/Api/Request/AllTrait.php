<?php

namespace Stefna\Mailchimp\Api\Request;

trait AllTrait
{
	protected $paramCount = 'count';
	protected $paramOffset = 'offset';

	public function setCount($value)
	{
		$this->data[$this->paramCount] = (int)$value;
		return $this;
	}

	public function setOffset($value)
	{
		$this->data[$this->paramOffset] = (int)$value;
		return $this;
	}

}
