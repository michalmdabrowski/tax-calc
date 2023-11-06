<?php

namespace MichalDabrowski\TaxCalc\Specification;

class RegExp implements Specification
{
    private string $regExp;

    public function __construct(string $regExp)
    {
        $this->regExp = $regExp;
    }

    public function isSatisfiedBy($value): bool
    {
        return preg_match($this->regExp, $value);
    }
}