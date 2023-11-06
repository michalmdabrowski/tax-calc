<?php

namespace MichalDabrowski\TaxCalc\Tests\Specification;

use MichalDabrowski\TaxCalc\Specification\Specification;

trait SpecificationMocks
{
    private function getAlwaysSatisfiedSpecification()
    {
        $stub = $this->getMockBuilder(Specification::class)->getMock();
        $stub->method('isSatisfiedBy')->willReturn(true);
        return $stub;
    }

    private function getAlwaysNotSatisfiedSpecification()
    {
        $stub = $this->getMockBuilder(Specification::class)->getMock();
        $stub->method('isSatisfiedBy')->willReturn(false);
        return $stub;
    }
}