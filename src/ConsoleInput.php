<?php

namespace MichalDabrowski\TaxCalc;

class ConsoleInput
{
    public function __construct(
        public readonly string $scriptName,
        public readonly array $parameters,
    )
    {
    }
}