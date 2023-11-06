<?php

namespace MichalDabrowski\TaxCalc\Tests\Specification;

use MichalDabrowski\TaxCalc\Specification\NotEmpty;
use PHPUnit\Framework\TestCase;

class NotEmptyTest extends TestCase
{
    /**
     * @dataProvider isSatisfiedByDataProvider
     */
    public function testIsSatisfiedBy($value, $expected)
    {
        $specification = new NotEmpty();

        $result = $specification->isSatisfiedBy($value);

        $this->assertSame($expected, $result);
    }

    public static function isSatisfiedByDataProvider(): array
    {
        $object = new class {};
        return [
            [null, false],
            ['', false],
            [[], false],
            [$object, true],
            ['not-empty', true],
            [0, true],
            [1, true],
            [[1], true],
        ];
    }
}
