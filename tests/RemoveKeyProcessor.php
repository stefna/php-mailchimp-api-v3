<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp;

use Monolog\Logger;

class RemoveKeyProcessor
{
	private string $key;
	/** @var int|string */
	private $level;

	public static function removeKey(&$array, $key): void
	{
		if (!$array || !is_array($array)) {
			return;
		}
		if (isset($array[$key])) {
			unset($array[$key]);
		}
		foreach ($array as &$v) {
			if (is_array($v)) {
				self::removeKey($v, $key);
			}
		}
	}

	public function __construct(string $key, $level = Logger::DEBUG)
	{
		$this->key = $key;
		$this->level = Logger::toMonologLevel($level);
	}

	public function __invoke(array $record): array
	{
		if ($record['level'] < $this->level) {
			return $record;
		}
		if (isset($record['context']['body'])) {
			self::removeKey($record['context']['body'], $this->key);
		}
		return $record;
	}
}
