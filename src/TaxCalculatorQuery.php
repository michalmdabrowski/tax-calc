<?php

namespace MichalDabrowski\TaxCalc;

class TaxCalculatorQuery
{
    public function __construct(
        public readonly int $value,
        public readonly TaxGroup $taxGroup,
    )
    {
    }
}