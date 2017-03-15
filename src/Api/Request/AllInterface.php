<?php

namespace Stefna\Mailchimp\Api\Request;

interface AllInterface
{
	/**
	 * @param int $value
	 * @return AllInterface
	 */
	public function setCount($value);

	/**
	 * @param int $value
	 * @return AllInterface
	 */
	public function setOffset($value);

}
