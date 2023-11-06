<?php

namespace MichalDabrowski\TaxCalc;

interface CalculationStrategy
{
    public function calculate(int $value): int;
}