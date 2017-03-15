<?php

namespace Tests\Stefna\Mailchimp;

use Monolog\Logger;

class RemoveKeyProcessor
{
	public function __construct($key, $level = Logger::DEBUG)
	{
		$this->key = $key;
		$this->level = Logger::toMonologLevel($level);
	}

	public function __invoke(array $record)
	{
		if ($record['level'] < $this->level) {
			return $record;
		}
		if (isset($record['context']['body'])) {
			self::removeKey($record['context']['body'], $this->key);
		}
		return $record;
	}

	public static function removeKey(&$array, $key)
	{
		if (!$array || !is_array($array)) return;
		if (isset($array[$key])) {
			unset($array[$key]);
		}
		foreach ($array as $k => &$v) {
			if (is_array($v)) {
				self::removeKey($v, $key);
			}
		}
	}

}
