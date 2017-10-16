<?php
require_once '../../vendor/autoload.php';
require_once 'NamedObserver.php';
require_once 'NamedSubject.php';

use LoculusEvolution\DesignPatterns\Demo\Observer\NamedObserver;
use LoculusEvolution\DesignPatterns\Demo\Observer\NamedSubject;


$observer1 = new NamedObserver('One-1');
$observer2 = new NamedObserver('Two-2');

echo $observer1, PHP_EOL;
echo $observer2, PHP_EOL;

$subjectAlpha = new NamedSubject('Alpha');
$subjectBeta  = new NamedSubject('Beta');

echo $subjectAlpha, PHP_EOL;
echo $subjectBeta, PHP_EOL;

$subjectAlpha->setValue(15.3);
$subjectBeta->setValue(11.2);

$observer1->attach($subjectAlpha);
$observer2->attach($subjectBeta);

$subjectAlpha->setValue(14.3);
$subjectBeta->setValue(15.2);
$subjectBeta->setValue(15.1);
$subjectBeta->setValue(15.21);
$subjectBeta->setValue(15.28);
$subjectBeta->setValue(12.67);

$subjectAlpha->setActive();
$subjectBeta->setDisabled();

$observer1->detach($subjectAlpha);
$observer2->detach($subjectAlpha);

$subjectAlpha->setValue(11.32);
$subjectBeta->setValue(11.23);

$observer2->detach($subjectBeta);

echo $subjectAlpha, PHP_EOL;
echo $subjectBeta, PHP_EOL;