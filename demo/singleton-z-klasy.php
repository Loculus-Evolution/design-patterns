<?php
require_once '../src/LoculusEvolution/DesignPatterns/Singleton/SingletonInterface.php';
require_once '../src/LoculusEvolution/DesignPatterns/Singleton/AbstractSingleton.php';
require_once '../src/LoculusEvolution/DesignPatterns/Singleton/Singleton.php';

use LoculusEvolution\DesignPatterns\Singleton\Singleton;

echo 'test-1.', PHP_EOL;

$objectOne = Singleton::getInstance();

echo 'test-2.', PHP_EOL;
echo '  skipping..', PHP_EOL;
$object2 = new Singleton();

echo 'test-3.', PHP_EOL;
echo '  skipping..', PHP_EOL;
$object3 = clone $objectOne;

echo 'done.', PHP_EOL;

//var_dump($objectOne);
//var_dump($object2);
//var_dump($object3);
