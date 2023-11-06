<?php

namespace MichalDabrowski\TaxCalc\Tests\Specification;

use MichalDabrowski\TaxCalc\Specification\AllOf;
use PHPUnit\Framework\TestCase;

class AllOfTest extends TestCase
{
    use SpecificationMocks;

    public function testIsSatisfiedBy()
    {
        $specification = new AllOf(
            $this->getAlwaysSatisfiedSpecification(),
            $this->getAlwaysSatisfiedSpecification(),
        );

        $result = $specification->isSatisfiedBy(0);

        $this->assertTrue($result);
    }

    public function testIsNotSatisfiedBy()
    {
        $specification = new AllOf(
            $this->getAlwaysSatisfiedSpecification(),
            $this->getAlwaysNotSatisfiedSpecification(),
        );

        $result = $specification->isSatisfiedBy(0);

        $this->assertFalse($result);
    }
}
