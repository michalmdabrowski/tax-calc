<?php

namespace MichalDabrowski\TaxCalc;

class TaxCalculatorResult
{
    public function __construct(
        public readonly int $result,
    )
    {
    }
}