<?php

namespace MichalDabrowski\TaxCalc\Tests\Specification;

use MichalDabrowski\TaxCalc\Specification\Argument;
use MichalDabrowski\TaxCalc\Specification\NotEmpty;
use PHPUnit\Framework\TestCase;

class ArgumentTest extends TestCase
{

    public function testIsSatisfiedBy()
    {
        $specification = new Argument(1, new NotEmpty());

        $result = $specification->isSatisfiedBy([null, 1]);

        $this->assertTrue($result);
    }

    public function testIsNotSatisfiedBy()
    {
        $specification = new Argument(0, new NotEmpty());

        $result = $specification->isSatisfiedBy([null, 1]);

        $this->assertFalse($result);
    }
}
