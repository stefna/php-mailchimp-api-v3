<?php

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
