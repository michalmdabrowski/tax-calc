<?php

namespace MichalDabrowski\TaxCalc\Specification;

class Argument extends AllOf
{
    private mixed $key;

    public function __construct($key, Specification ...$constraints)
    {
        $this->key = $key;
        parent::__construct(...$constraints);
    }

    public function isSatisfiedBy($value): bool
    {
        return parent::isSatisfiedBy($value[$this->key]);
    }
}