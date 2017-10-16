<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

/**
 * Interface SingletonInterface
 *
 * @package LoculusEvolution\DesignPatterns\Singleton
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
interface SingletonInterface
{
    /**
     * Returns an instance of the object based on Singleton design pattern
     *
     * @param  string  $className  Class name
     * @return SingletonInterface
     */
    public static function getInstance(string $className = AbstractSingleton::class): SingletonInterface;
}