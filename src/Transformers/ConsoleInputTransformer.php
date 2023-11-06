<?php

namespace MichalDabrowski\TaxCalc\Transformers;

use MichalDabrowski\TaxCalc\ConsoleInput;
use MichalDabrowski\TaxCalc\TaxCalculatorQuery;
use MichalDabrowski\TaxCalc\TaxGroup;

class ConsoleInputTransformer
{
    public function __construct(public readonly ConsoleInput $consoleInput)
    {
    }

    public static function transform(ConsoleInput $consoleInput): static
    {
        return new self($consoleInput);
    }

    public function into(string $class): ConsoleInput|TaxCalculatorQuery
    {
        return match ($class) {
            TaxCalculatorQuery::class => $this->transformIntoTaxCalculatorQuery(),
            default => $this->consoleInput,
        };
    }

    private function transformIntoTaxCalculatorQuery(): TaxCalculatorQuery
    {
        return new TaxCalculatorQuery(
            $this->getInt($this->consoleInput->parameters[0]),
            $this->getTaxGroup($this->consoleInput->parameters[1]),
        );
    }

    private function getInt(mixed $value): int
    {
        return (int)$value * 100;
    }

    private function getTaxGroup(mixed $value): TaxGroup
    {
        return match ($value) {
            1, '1', 'I', 'i', '1.' => TaxGroup::I,
            2, '2', 'II', 'ii', '2.' => TaxGroup::II,
            3, '3', 'III', 'iii', '3.' => TaxGroup::III,
        };
    }
}