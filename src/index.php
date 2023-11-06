<?php
require_once './vendor/autoload.php';

use MichalDabrowski\TaxCalc\Application;

$app = new Application();
$app->call($argv);