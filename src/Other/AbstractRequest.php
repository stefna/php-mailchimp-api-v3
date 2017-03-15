<?php

namespace Stefna\Mailchimp\Other;

abstract class AbstractRequest
{
	protected $data = [];

	public function toArgs()
	{
		return $this->data;
	}
}
