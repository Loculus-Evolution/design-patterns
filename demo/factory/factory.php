<?php
require_once '../../vendor/autoload.php';

use tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Factory\VehicleFactory;

echo 'starting..', PHP_EOL;

$bike   = VehicleFactory::factory('bike');
echo 'product 1: ', $bike->getModelName(), PHP_EOL;

$car    = VehicleFactory::factory('car');
echo 'product 2: ', $car->getModelName(), PHP_EOL;

//$plane  = ProductFactory::factory('plane');
//echo 'product 3: ', $plane->getModelName(), PHP_EOL;

echo 'done.', PHP_EOL;