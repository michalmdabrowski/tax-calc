<?php

namespace MichalDabrowski\TaxCalc\CalculationStrategies;

use MichalDabrowski\TaxCalc\CalculationStrategy;

class TaxGroupIIICalculationStrategy extends TaxGroupCalculationStrategyTemplate
{
    protected int $taxFreeAllowance = 573300;
    protected float $level1TaxRate = 0.12;
    protected float $level2TaxRate = 0.16;
    protected float $level3TaxRate = 0.20;
    protected int $level2TaxConstRate = 142000;
    protected int $level3TaxConstRate = 331320;
}