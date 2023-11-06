<?php

namespace MichalDabrowski\TaxCalc;

class ConsoleInputFactory
{
    public static function create(array $argv): ConsoleInput
    {
        return new ConsoleInput(
            $argv[0],
            array_slice($argv, 1),
        );
    }
}