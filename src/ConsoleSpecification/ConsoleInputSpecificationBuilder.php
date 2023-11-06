<?php

namespace MichalDabrowski\TaxCalc\ConsoleSpecification;

use MichalDabrowski\TaxCalc\Specification\AllOf;
use MichalDabrowski\TaxCalc\Specification\Argument;
use MichalDabrowski\TaxCalc\Specification\Specification;

class ConsoleInputSpecificationBuilder
{
    private AllOf $constraints;

    public function __construct()
    {
        $this->init();
    }

    public function addParameter(Specification ...$parameterConstraints): static
    {
        $this->constraints->add(
            new Argument($this->getParameterIndex(), ...$parameterConstraints),
        );
        return $this;
    }

    public function get(): ConsoleSpecification
    {
        $specification = clone $this->constraints;
        $this->init();
        return new ConsoleSpecificationAdapter($specification);
    }

    private function init(): void
    {
        $this->constraints = new AllOf();
    }

    private function getParameterIndex(): int
    {
        return count($this->constraints);
    }
}