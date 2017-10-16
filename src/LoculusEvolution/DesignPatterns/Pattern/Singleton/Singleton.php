<?php
namespace LoculusEvolution\DesignPatterns\Pattern\Singleton;

use LoculusEvolution\DesignPatterns\Exception\ClassNotFoundException;

/**
 * Simple instance factory final class implementing Singleton design pattern by extending abstract class.
 *
 * @package LoculusEvolution\DesignPatterns\Pattern\Singleton
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class Singleton extends AbstractSingleton
{
    /**
     * Singleton constructor.
     *
     * It's private because Singleton design pattern means, than we cannot create an instance of the object
     * based on the Singleton in standard way by writing: new Singleton().
     */
    private function __construct()
    {
    }

    /**
     * Singleton cloning locker.
     *
     * It's private because singleton design pattern means, than we cannot clone an instance of the object
     * based on the singleton in standard way by clone function.
     */
    private function __clone()
    {
    }


    /**
     * Returns an instance of the object based on Singleton design pattern
     *
     * @param  string  $className  Class name
     * @return SingletonInterface
     * @throws ClassNotFoundException
     */
    public static function getInstance(string $className = self::class): SingletonInterface
    {
        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new ClassNotFoundException(
                    '',
                    ClassNotFoundException::EXCEPTION_CODE,
                    $className
                );
            }

            static::$instance = new $className();
        }

        return static::$instance;
    }
}