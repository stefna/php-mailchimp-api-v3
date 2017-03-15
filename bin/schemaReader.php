<?php

if (!isset($_SERVER['argv'][1])) {
	echo "Usage: " . $_SERVER['argv'][0] . " schemaUrl\n";
	exit(1);
}
function error($msg) {
	echo "ERROR: $msg\n\n";
	exit(2);
}
function output($key, $type) {
	return "/** @var $type */\npublic \$$key;";
}
function parseType($property) {
	$type = $property->type;
	$isClass = false;
	if ($type === 'object') {
		$type = $property->title;
		$isClass = true;
	}
	return camelCase($type, !$isClass);
}
function camelCase($str, $doLowerFirst = true, array $noStrip = [])
{
	// non-alpha and non-numeric characters become spaces
	$str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
	$str = trim($str);
	// uppercase the first character of each word
	$str = ucwords($str);
	$str = str_replace(" ", "", $str);

	if ($doLowerFirst) {
		$str = lcfirst($str);
	}

	return $str;
}
function outputSubs($classes) {
	$list = '';
	foreach ($classes as $key => $type) {
		$key = camelCase($key);
		$list .= "\t'$key' => $type::class,\n";
	}
	return "protected \$classMap = [\n$list];\n";
}
function doIt($object, &$ret) {
	$myType = parseType($object);
	$subClasses = [];
	foreach ($object->properties as $key => $property) {
		if (isset($property->type)) {
			$ret[$myType][] = output(camelCase($key), parseType($property));
			if (isset($property->properties)) {
				$subType = parseType($property);
				doIt($property, $ret);
				$subClasses[$key] = $subType;
			}
		}
	}
	if ($subClasses) {
		$ret[$myType][] = outputSubs($subClasses);
	}
}
function echoOutput($output) {
	foreach ($output as $type => $items) {
		echo "Class: $type\n\n";
		echo implode("\n", $items);
		echo "\n---------------------------------\n\n";
	}
}

$url = $_SERVER['argv'][1];

$data = file_get_contents($url);
if (!$data) error("Could not fetch data from $url");

$json = json_decode($data);
if (json_last_error() !== JSON_ERROR_NONE) error("Could not parse json: " . json_last_error_msg());

if (!isset($json->properties)) error("Could not find properties");

$output = [];
doIt($json, $output);

echoOutput($output);

echo "\n";
