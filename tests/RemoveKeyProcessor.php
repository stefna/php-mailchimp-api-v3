<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp;

use Monolog\Logger;

class RemoveKeyProcessor
{
	private string $key;
	private int $level;

	/**
	 * @param array<string, mixed>|null $array
	 */
	public static function removeKey(array|string|null &$array, string $key): void
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

	public function __construct(string $key)
	{
		$this->key = $key;
		$this->level = Logger::toMonologLevel(Logger::DEBUG);
	}

	/**
	 * @param array<string, scalar|array<string, scalar|array<string, scalar>>> $record
	 * @return array<string, scalar|array<string, scalar|array<string, scalar>>>
	 */
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
