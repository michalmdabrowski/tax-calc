<?php

namespace MichalDabrowski\TaxCalc\Specification;

class NotEmpty implements Specification
{

    public function isSatisfiedBy($value): bool
    {
        return !empty($value) || $value === 0;
    }
}