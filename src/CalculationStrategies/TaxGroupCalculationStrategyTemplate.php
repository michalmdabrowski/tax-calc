<?php

namespace MichalDabrowski\TaxCalc\CalculationStrategies;

use MichalDabrowski\TaxCalc\CalculationStrategy;

abstract class TaxGroupCalculationStrategyTemplate implements CalculationStrategy
{
    const SURPLUS_LEVEL_1 = 1183300;
    const SURPLUS_LEVEL_2 = 2366500;

    protected int $taxFreeAllowance;
    protected float $level1TaxRate;
    protected float $level2TaxRate;
    protected float $level3TaxRate;
    protected int $level2TaxConstRate;
    protected int $level3TaxConstRate;

    public function calculate(int $value): int
    {
        if ($this->isTaxFree($value)) {
            return 0;
        }

        $valueToCalculate = $value - $this->getTaxFreeAllowance();

        return match (true) {
            $valueToCalculate <= self::SURPLUS_LEVEL_1 => $this->calculateLevel1($valueToCalculate),
            $valueToCalculate <= self::SURPLUS_LEVEL_2 => $this->calculateLevel2($valueToCalculate),
            $valueToCalculate > self::SURPLUS_LEVEL_2 => $this->calculateLevel3($valueToCalculate),
        };
    }

    private function isTaxFree(int $value): bool
    {
        return $value <= $this->getTaxFreeAllowance();
    }

    private function calculateLevel1(int $valueToCalculate): int
    {
        return $valueToCalculate * $this->getLevel1TaxRate();
    }

    private function calculateLevel2(int $valueToCalculate): int
    {
        $valueToCalculate = $valueToCalculate - self::SURPLUS_LEVEL_1;
        return $this->getLevel2TaxConstRate() + $valueToCalculate * $this->getLevel2TaxRate();
    }

    private function calculateLevel3(int $valueToCalculate): int
    {
        $valueToCalculate = $valueToCalculate - self::SURPLUS_LEVEL_2;
        return $this->getLevel3TaxConstRate() + $valueToCalculate * $this->getLevel3TaxRate();
    }

    protected function getTaxFreeAllowance(): int
    {
        return $this->taxFreeAllowance;
    }

    protected function getLevel1TaxRate(): float
    {
        return $this->level1TaxRate;
    }

    protected function getLevel2TaxRate(): float
    {
        return $this->level2TaxRate;
    }

    protected function getLevel3TaxRate(): float
    {
        return $this->level3TaxRate;
    }

    protected function getLevel2TaxConstRate(): int
    {
        return $this->level2TaxConstRate;
    }

    protected function getLevel3TaxConstRate(): int
    {
        return $this->level3TaxConstRate;
    }
}