<?php

namespace MichalDabrowski\TaxCalc\Tests\Specification;

use MichalDabrowski\TaxCalc\Specification\RegExp;
use PHPUnit\Framework\TestCase;

class RegExpTest extends TestCase
{

    /**
     * @dataProvider isSatisfiedByDataProvider
     */
    public function testIsSatisfiedBy($value, $expected)
    {
        $specification = new RegExp('/^[1-9]{3}$/');

        $result = $specification->isSatisfiedBy($value);

        $this->assertSame($expected, $result);
    }

    public static function isSatisfiedByDataProvider(): array
    {
        return [
            ['null', false],
            ['1234', false],
            ['12', false],
            [' 123', false],
            ['123 ', false],
            ['123', true],
        ];
    }
}
