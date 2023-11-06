<?php

namespace MichalDabrowski\TaxCalc\Specification;

class AllOf implements Specification, \Countable
{
    /**
     * @var Specification[]
     */
    private array $constraints;

    public function __construct(Specification ...$constraints)
    {
        $this->constraints = $constraints;
    }

    public function add(Specification $constraint): void
    {
        $this->constraints[] = $constraint;
    }

    public function isSatisfiedBy($value): bool
    {
        foreach ($this->constraints as $constraint) {
            if(!$constraint->isSatisfiedBy($value)) return false;
        }
        return true;
    }

    public function count(): int
    {
        return count($this->constraints);
    }
}