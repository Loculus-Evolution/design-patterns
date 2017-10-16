<?php
namespace tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton;

use LoculusEvolution\DesignPatterns\Pattern\Singleton;

/**
 * ODMM class implementing Singleton design pattern by using SingletonTrait.
 *
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @createdAt 2017-10-16T09M02S59, Europe/Krakow
 */
final class MQPM
{
    use Singleton\SingletonTrait;
}