<?php
declare(strict_types=1);

namespace Stefna\Mailchimp\Api\Request;

interface AllInterface
{
	/**
	 * @param int $value
	 * @return AllInterface
	 */
	public function setCount(int $value);

	/**
	 * @param int $value
	 * @return AllInterface
	 */
	public function setOffset(int $value);

}
