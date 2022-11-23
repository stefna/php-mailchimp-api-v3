<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Request;

interface AllInterface
{
	public function setCount(int $value): void;

	public function setOffset(int $value): void;
}
