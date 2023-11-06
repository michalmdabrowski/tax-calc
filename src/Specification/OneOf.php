<?php

namespace MichalDabrowski\TaxCalc\Specification;

class OneOf implements Specification
{
    /**
     * @var Specification[]
     */
    private array $constraints;

    public function __construct(Specification ...$constraints)
    {
        $this->constraints = $constraints;
    }

    public function isSatisfiedBy($value): bool
    {
        foreach ($this->constraints as $constraint) {
            if($constraint->isSatisfiedBy($value)) return true;
        }
        return false;
    }
}