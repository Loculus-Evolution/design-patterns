<?php
namespace LoculusEvolution\DesignPatterns\Pattern\Singleton;

use LoculusEvolution\DesignPatterns\Exception\ClassNotFoundException;

/**
 * Trait SingletonTrait
 *
 * @package LoculusEvolution\DesignPatterns\Pattern\Singleton
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
trait SingletonTrait
{
    /**
     * @var SingletonInterface
     */
    private static $instance;


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
     * @param  string  $className
     * @return SingletonInterface
     * @throws ClassNotFoundException
     */
    public static function getInstance(string $className = Singleton::class): SingletonInterface
    {
        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new ClassNotFoundException(
                    '',
                    ClassNotFoundException::EXCEPTION_CODE,
                    $className
                );
            }

            static::$instance = $className::getInstance();
        }

        return static::$instance;
    }
}