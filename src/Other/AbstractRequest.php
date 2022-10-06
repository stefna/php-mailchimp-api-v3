<?php

namespace Stefna\Mailchimp\Other;

abstract class AbstractRequest
{
	/**
	 * @var array<string, mixed>
	 */
	protected array $data = [];

	/**
	 * @return array<string, mixed>
	 */
	public function toArgs(): array
	{
		return $this->data;
	}
}
