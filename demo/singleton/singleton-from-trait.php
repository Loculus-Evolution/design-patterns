<?php
require_once '../../vendor/autoload.php';
require_once 'InstanceFactory.php';

use LoculusEvolution\DesignPatterns\Demo\Singleton\InstanceFactory;

echo 'test-1.', PHP_EOL;

$objectOne = InstanceFactory::getInstance();
$objectTwo = $objectOne;
$objectThree = $objectOne;

echo 'test-2.', PHP_EOL;

//$object2 = new InstanceFactory();

echo 'test-3.', PHP_EOL;

//$object3 = clone $objectOne;

var_dump($objectOne);
//var_dump($object2);
//var_dump($object3);

echo 'done.', PHP_EOL;
exit(1);
