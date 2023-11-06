<?php

namespace MichalDabrowski\TaxCalc\Tests\Specification;

use MichalDabrowski\TaxCalc\Specification\OneOf;
use PHPUnit\Framework\TestCase;

class OneOfTest extends TestCase
{
    use SpecificationMocks;

    public function testIsSatisfiedBy()
    {
        $specification = new OneOf(
            $this->getAlwaysSatisfiedSpecification(),
            $this->getAlwaysNotSatisfiedSpecification(),
        );

        $result = $specification->isSatisfiedBy(0);

        $this->assertTrue($result);
    }

    public function testIsNotSatisfiedBy()
    {
        $specification = new OneOf(
            $this->getAlwaysNotSatisfiedSpecification(),
            $this->getAlwaysNotSatisfiedSpecification(),
        );

        $result = $specification->isSatisfiedBy(0);

        $this->assertFalse($result);
    }
}
