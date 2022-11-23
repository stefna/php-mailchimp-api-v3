<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp;

use PHPUnit\Framework\TestCase as UnitTestCase;
use Tests\Stefna\Mailchimp\Api\TestCase as TestedTestCase;

class ArrayIntersectAssocRecursiveTest extends UnitTestCase
{
	/**
	 * @param $a
	 * @param $b
	 * @param $expected
	 * @dataProvider provide
	 */
	public function test($a, $b, $expected): void
	{
		$this->assertEquals($expected, TestedTestCase::array_intersect_assoc_recursive($a, $b));
	}

	public function provide(): array
	{
		return [
			'php.net' => [
				['a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red'],
				['a' => 'green', 'b' => 'yellow', 'blue', 'red'],
				['a' => 'green'],
			],
			'assocSimple' => [
				['a' => 1, 'b' => ['c' => 3, 'd' => 4]],
				['b' => ['d' => 4]],
				['b' => ['d' => 4]],
			],
			'assocBad' => [
				['a' => 1, 'b' => ['c' => 3, 'd' => 4]],
				['b' => ['d' => 5]],
				[],
			],
		];
	}
}
