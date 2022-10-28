<?php declare(strict_types=1);

namespace Stefna\Mailchimp\Other;

class AbstractData
{
	/** @var array<int,array<string, string>> */
	public array $_links = [];
	/** @var array<string, class-string<AbstractData>|array{0?: string, 1?:string}> */
	protected array $classMap = [];

	/**
	 * @param array<string, mixed>|null $data
	 */
	public function __construct(?array $data = null)
	{
		if ($data) {
			$this->setData($data);
		}
	}

	public static function camelCase(string $str): string
	{
		// non-alpha and non-numeric characters become spaces
		$str = preg_replace('/[^a-z0-9]+/i', ' ', $str);
		$str = trim((string)$str);
		// uppercase the first character of each word
		$str = ucwords($str);
		$str = str_replace(' ', '', $str);

		return lcfirst($str);
	}

	/**
	 * @param string $value
	 * @return string
	 * @see http://stackoverflow.com/a/1993772
	 */
	public static function snakeCase(string $value): string
	{
		preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $value, $matches);
		$ret = $matches[0];
		if (!$ret || (isset($matches[1][0]) && $matches[1][0] === $value)) {
			return $value;
		}
		foreach ($ret as &$match) {
			$match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
		}
		return implode('_', $ret);
	}

	/**
	 * @param array<array-key, mixed> $array
	 * @return array<string, mixed>
	 */
	public static function snakeCaseArray(array $array): array
	{
		$ret = [];
		foreach ($array as $key => $value) {
			$key = static::snakeCase((string)$key);
			if (is_array($value)) {
				$value = self::snakeCaseArray($value);
			}
			$ret[$key] = $value;
		}
		return $ret;
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public function setData(array $data): AbstractData
	{
		foreach ($data as $key => $value) {
			$key = static::camelCase($key);
			if (property_exists($this, $key)) {
				if (isset($this->classMap[$key])) {
					if (is_array($this->classMap[$key]) && isset($this->classMap[$key][0])) {
						$classes = $this->classMap[$key];
						$first = $classes[0];
						if (is_array($value)) {
							$tmp = [];
							foreach ($value as $i => $itemData) {
								$className = $classes[$i] ?? $first;
								$tmp[] = new $className($itemData);
							}
							$value = $tmp;
						}
					}
					else {
						$class = $this->classMap[$key];
						$value = new $class($value);
					}
				}
				$this->$key = $value;
			}
		}
		return $this;
	}

	/**
	 * @return array<string, mixed>
	 */
	public function getData(): array
	{
		/** @var array<string, mixed> $data */
		$data = get_object_vars($this);
		unset($data['classMap']);
		foreach (array_keys($this->classMap) as $key) {
			if (isset($data[$key]) && is_object($data[$key])) {
				if ($data[$key] instanceof self) {
					$data[$key] = $data[$key]->getData();
				}
				else {
					unset($data[$key]);
				}
			}
		}
		// Don't include empty links
		if (!$data['_links']) {
			unset($data['_links']);
		}
		return static::snakeCaseArray(array_filter($data, static function ($value) {
			return null !== $value;
		}));
	}
}
