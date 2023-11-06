<?php

namespace MichalDabrowski\TaxCalc;

use MichalDabrowski\TaxCalc\ConsoleSpecification\ConsoleInputSpecificationBuilder;
use MichalDabrowski\TaxCalc\ConsoleSpecification\ConsoleSpecification;
use MichalDabrowski\TaxCalc\Specification\NotEmpty;
use MichalDabrowski\TaxCalc\Specification\OneOf;
use MichalDabrowski\TaxCalc\Specification\RegExp;
use MichalDabrowski\TaxCalc\Transformers\ConsoleInputTransformer;
use MichalDabrowski\TaxCalc\Transformers\TaxCalculatorResultTransformer;

class Application
{
    public function call($argv): void
    {
        $consoleInput = $this->getConsoleInput($argv);
        if ($this->isConsoleInputValid($consoleInput)) {
            $result = $this->getResult($consoleInput);
            $this->renderResult($result);
        } else {
            throw new \Exception('Invalid parameters');
        }
    }

    private function getConsoleInput(array $argv): ConsoleInput
    {
        return ConsoleInputFactory::create($argv);
    }

    private function isConsoleInputValid(ConsoleInput $consoleInput): bool
    {
        $consoleInputSpecification = $this->getConsoleInputSpecification();
        return $consoleInputSpecification->isSatisfiedBy($consoleInput);
    }

    private function getConsoleInputSpecification(): ConsoleSpecification
    {
        $specificationBuilder = new ConsoleInputSpecificationBuilder();
        return $specificationBuilder
            ->addParameter(
                new NotEmpty(),
                new RegExp('/^[1-9]\d*((\.|,)\d{1,2})?$/'),
            )
            ->addParameter(
                new NotEmpty(),
                new OneOf(
                    new RegExp('/1|2|3/'),
                    new RegExp('/I|II|III/'),
                ),
            )
            ->get();
    }

    private function getResult(ConsoleInput $consoleInput): TaxCalculatorResult
    {
        $taxCalculatorQuery = ConsoleInputTransformer::transform($consoleInput)->into(TaxCalculatorQuery::class);
        $taxCalculator = new TaxCalculator();
        return $taxCalculator->calculate($taxCalculatorQuery);
    }

    private function renderResult(TaxCalculatorResult $result): void
    {
        $consoleOutput = TaxCalculatorResultTransformer::transform($result)->into(ConsoleOutput::class);
        $consoleOutput->render();
    }
}