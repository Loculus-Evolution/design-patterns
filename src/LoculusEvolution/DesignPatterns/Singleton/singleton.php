<?php
use LoculusEvolution\DesignPatterns\Singleton\Singleton;

$objectOne = Singleton::getInstance();

//$object2 = new Singleton();

$object3 = clone $objectOne;

var_dump($objectOne);
var_dump($objectOne);
var_dump($object3);