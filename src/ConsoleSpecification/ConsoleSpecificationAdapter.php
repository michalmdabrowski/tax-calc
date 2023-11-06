<?php

namespace MichalDabrowski\TaxCalc\ConsoleSpecification;

use MichalDabrowski\TaxCalc\ConsoleInput;
use MichalDabrowski\TaxCalc\Specification\Specification;

class ConsoleSpecificationAdapter implements ConsoleSpecification
{
    public function __construct(private readonly Specification $specification)
    {
    }

    public function isSatisfiedBy(ConsoleInput $consoleInput): bool
    {
        return $this->specification->isSatisfiedBy($consoleInput->parameters);
    }
}