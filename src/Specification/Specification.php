<?php

namespace MichalDabrowski\TaxCalc\Specification;

interface Specification
{
    public function isSatisfiedBy($value): bool;
}