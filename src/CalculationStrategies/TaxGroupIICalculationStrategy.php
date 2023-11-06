<?php

namespace MichalDabrowski\TaxCalc\CalculationStrategies;

use MichalDabrowski\TaxCalc\CalculationStrategy;

class TaxGroupIICalculationStrategy extends TaxGroupCalculationStrategyTemplate
{
    protected int $taxFreeAllowance = 2709000;
    protected float $level1TaxRate = 0.07;
    protected float $level2TaxRate = 0.09;
    protected float $level3TaxRate = 0.12;
    protected int $level2TaxConstRate = 82840;
    protected int $level3TaxConstRate = 189330;
}