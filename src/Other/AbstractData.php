<?php

namespace Stefna\Mailchimp\Other;

class AbstractData
{
	public $_links;
	protected $classMap = [];

	public function __construct(array $data = null)
	{
		if ($data) {
			$this->setData($data);
		}
	}

	public static function camelCase($str)
	{
		// non-alpha and non-numeric characters become spaces
		$str = preg_replace('/[^a-z0-9]+/i', ' ', $str);
		$str = trim($str);
		// uppercase the first character of each word
		$str = ucwords($str);
		$str = str_replace(" ", "", $str);

		$str = lcfirst($str);

		return $str;
	}

	/**
	 * @param $value
	 * @return string
	 * @see http://stackoverflow.com/a/1993772
	 */
	public static function snakeCase($value)
	{
		preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $value, $matches);
		$ret = $matches[0];
		if (!$ret
			|| (isset($matches[1]) && isset($matches[1][0]) && $matches[1][0] === $value)
		) {
			return $value;
		}
		foreach ($ret as &$match) {
			$match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
		}
		return implode('_', $ret);
	}

	public static function snakeCaseArray(array $array)
	{
		$ret = [];
		foreach ($array as $key => $value) {
			$key = static::snakeCase($key);
			if (is_array($value)) {
				$value = self::snakeCaseArray($value);
			}
			$ret[$key] = $value;
		}
		return $ret;
	}

	public function setData($data)
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
								$className = (isset($classes[$i])) ? $classes[$i] : $first;
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

	public function getData()
	{
		$data = call_user_func('get_object_vars', $this);
		foreach (array_keys($this->classMap) as $key) {
			if (isset($data[$key]) && is_object($data[$key])) {
				if ($data[$key] instanceof AbstractData) {
					/** @noinspection PhpUndefinedMethodInspection */
					$data[$key] = $data[$key]->getData();
				}
				else {
					unset($data[$key]);
				}
			}
		}
		return static::snakeCaseArray(array_filter($data, function ($value) {
			return null !== $value;
		}));
	}

}
