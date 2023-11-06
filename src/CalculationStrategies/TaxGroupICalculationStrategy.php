<?php

namespace MichalDabrowski\TaxCalc\CalculationStrategies;

use MichalDabrowski\TaxCalc\CalculationStrategy;

class TaxGroupICalculationStrategy extends TaxGroupCalculationStrategyTemplate
{

    protected int $taxFreeAllowance = 3612000;
    protected float $level1TaxRate = 0.02;
    protected float $level2TaxRate = 0.05;
    protected float $level3TaxRate = 0.07;
    protected int $level2TaxConstRate = 35500;
    protected int $level3TaxConstRate = 94660;
}