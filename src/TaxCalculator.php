<?php

namespace MichalDabrowski\TaxCalc;

use MichalDabrowski\TaxCalc\CalculationStrategies\TaxGroupICalculationStrategy;
use MichalDabrowski\TaxCalc\CalculationStrategies\TaxGroupIICalculationStrategy;
use MichalDabrowski\TaxCalc\CalculationStrategies\TaxGroupIIICalculationStrategy;

class TaxCalculator
{

    public function __construct()
    {
    }

    public function calculate(TaxCalculatorQuery $taxCalculatorQuery): TaxCalculatorResult
    {
        $calculationStrategy = $this->getCalculationStrategy($taxCalculatorQuery->taxGroup);
        $result = $calculationStrategy->calculate($taxCalculatorQuery->value);
        return new TaxCalculatorResult($result);
    }

    private function getCalculationStrategy(TaxGroup $taxGroup): CalculationStrategy
    {
        return match ($taxGroup) {
            TaxGroup::I => new TaxGroupICalculationStrategy(),
            TaxGroup::II => new TaxGroupIICalculationStrategy(),
            TaxGroup::III => new TaxGroupIIICalculationStrategy(),
            default => $this->getNullCalculationStrategy(),
        };
    }

    private function getNullCalculationStrategy(): CalculationStrategy
    {
        return new class implements CalculationStrategy {
            public function calculate(int $value): int
            {
                return 0;
            }
        };
    }
}