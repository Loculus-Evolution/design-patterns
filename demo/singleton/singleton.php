<?php
require_once '../../vendor/autoload.php';

use LoculusEvolution\DesignPatterns\Singleton\Singleton;
use tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton\RDMM;

$objectOne = Singleton::getInstance();

//$object2 = new Singleton();

//$object3 = clone $objectOne;

$objectTwo   = $objectOne;
$objectThree = $objectOne;

var_dump($objectOne);
//var_dump($object2);
//var_dump($object3);
var_dump($objectTwo);
var_dump($objectThree);

$rdmm = RDMM::getInstance();
var_dump($rdmm);

echo 'done.', PHP_EOL;
exit(0);