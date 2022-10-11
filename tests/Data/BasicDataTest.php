<?php /** @noinspection PhpMissingFieldTypeInspection */
declare(strict_types=1);

namespace Tests\Stefna\Mailchimp\Data;

use PHPUnit\Framework\TestCase;
use Stefna\Mailchimp\Other\AbstractData;

class BasicDataTest extends TestCase
{
	public function test(): void
	{
		$data = [
			'a' => 1,
			'b' => [
				'c' => 2,
				'nono' => true,
				'd' => null,
				'e' => '',
				'f' => 0,
				'g' => false,
				'snake_case' => 9,
				'array' => [
					'FNAME' => 'Test',
				],
			],
		];
		$a = new A($data);

		$this->assertInstanceOf(B::class, $a->b);
		$this->assertEquals(1, $a->a);
		$this->assertEquals(2, $a->b->c);
		$this->assertEquals(9, $a->b->snakeCase);
		$expected = [
			'a' => 1,
			'b' => [
				'c' => 2,
				'e' => '',
				'f' => 0,
				'g' => false,
				'snake_case' => 9,
				'array' => [
					'FNAME' => 'Test',
				],
			],
		];
		$this->assertEquals($expected, $a->getData());
	}
}

class A extends AbstractData
{
	public $a;
	public B $b;

	protected array $classMap = [
		'b' => B::class,
	];
}

class B extends AbstractData
{
	public $c;
	public $d;
	public $e;
	public $f;
	public $g;
	public $snakeCase;
	public $array;
}
