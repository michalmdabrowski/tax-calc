<?php

namespace MichalDabrowski\TaxCalc\Transformers;

use MichalDabrowski\TaxCalc\ConsoleOutput;
use MichalDabrowski\TaxCalc\TaxCalculatorResult;

class TaxCalculatorResultTransformer
{
    public function __construct(public readonly TaxCalculatorResult $taxCalculatorResult)
    {
    }

    public static function transform(TaxCalculatorResult $taxCalculatorResult): static
    {
        return new self($taxCalculatorResult);
    }

    public function into(string $class): ConsoleOutput|TaxCalculatorResult
    {
        return match ($class) {
            ConsoleOutput::class => $this->transformIntoConsoleOutput(),
            default => $this->taxCalculatorResult,
        };
    }

    private function transformIntoConsoleOutput(): ConsoleOutput
    {
        return new ConsoleOutput("Należny podatek: ".$this->formatResultValue($this->taxCalculatorResult->result)." PLN");
    }

    private function formatResultValue(int $value): string
    {
        return number_format($value / 100, 2);
    }
}