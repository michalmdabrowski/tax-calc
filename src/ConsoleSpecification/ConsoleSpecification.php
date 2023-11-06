<?php

namespace MichalDabrowski\TaxCalc\ConsoleSpecification;

use MichalDabrowski\TaxCalc\ConsoleInput;

interface ConsoleSpecification
{
    public function isSatisfiedBy(ConsoleInput $consoleInput): bool;
}