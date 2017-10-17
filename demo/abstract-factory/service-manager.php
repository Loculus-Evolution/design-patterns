<?php
require_once '../../vendor/autoload.php';

use tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\AbstractFactory\ApiServiceManager;

echo 'starting..', PHP_EOL;

$list = [
    'Yahoo' => [
        'clientId' => 'ad09-afc8',
        'clientSecret' => 'ad09-afc8',
    ],
    'Google' => [
        'clientId' => 'ad09-afc7',
        'clientSecret' => 'ad09-afc7',
    ],
    'Facebook' => [
        'clientId' => 'ad09-afc6',
        'clientSecret' => 'ad09-afc6',
    ],
    'facebook' => [
        'clientId' => 'ad09-afc5',
        'clientSecret' => 'ad09-afc5',
    ],
    'TwitchTV' => [
        'clientId' => 'ad09-afc4',
        'clientSecret' => 'ad09-afc4',
    ],
//    'Apple' => [
//        'clientId' => 'ad09-afc3',
//        'clientSecret' => 'ad09-afc3',
//    ],
];

$idx = 0;

foreach ($list as $type => $config) {
    echo ++$idx, ' checking ', $type, PHP_EOL;

    $apiService = ApiServiceManager::factory($type, $config);
    $apiService->signUp();

    $thisClass = new \ReflectionClass($apiService);
    $className = $thisClass->getName();

    echo '  ', $className, PHP_EOL, '  passed.', PHP_EOL;
}

echo 'done.', PHP_EOL;