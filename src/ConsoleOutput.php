<?php

namespace MichalDabrowski\TaxCalc;

class ConsoleOutput
{
    public function __construct(
        public readonly string $output
    )
    {
    }

    public function render(): void
    {
        echo $this->output;
    }
}