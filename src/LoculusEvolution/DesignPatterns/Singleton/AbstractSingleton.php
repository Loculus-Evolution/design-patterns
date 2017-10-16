<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

/**
 * Class AbstractSingleton
 *
 * @package LoculusEvolution\DesignPatterns\Singleton
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
abstract class AbstractSingleton implements SingletonInterface
{
    /**
     * An instance of the object based on Singleton design pattern
     *
     * @var SingletonInterface
     */
    protected static $instance;

    /**
     * Returns an instance of the object based on Singleton design pattern
     *
     * @param  string  $className  Class name
     * @return SingletonInterface
     */
    abstract public static function getInstance(string $className = self::class): SingletonInterface;
}