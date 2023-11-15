<?php declare(strict_types=1);

namespace Tests\Stefna\Mailchimp;

use PHPUnit\Framework\TestCase as UnitTestCase;
use Tests\Stefna\Mailchimp\Api\TestCase as TestedTestCase;

class ArrayIntersectAssocRecursiveTest extends UnitTestCase
{
	/**
	 * @return array<string, array<int, array<array-key, scalar|array<array-key, scalar>>>>
	 */
	public static function provide(): array
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

	/**
	 * @param array<string, scalar|array<string, scalar>> $a
	 * @param array<string, scalar|array<string, scalar>> $b
	 * @param array<string, scalar|array<string, scalar>> $expected
	 * @dataProvider provide
	 */
	public function test(array $a, array $b, array $expected): void
	{
		$this->assertEquals($expected, TestedTestCase::array_intersect_assoc_recursive($a, $b));
	}
}
