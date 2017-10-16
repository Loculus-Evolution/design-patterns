<?php
namespace LoculusEvolution\DesignPatterns\Demo\Singleton;

use LoculusEvolution\DesignPatterns\Singleton\SingletonInterface;
use LoculusEvolution\DesignPatterns\Singleton\SingletonTrait;

use LoculusEvolution\DesignPatterns\Exception\ClassNotFoundException;

/**
 * Simple instance factory final class implementing Singleton design pattern by using trait.
 *
 * @package     LoculusEvolution\DesignPatterns\Demo\Singleton
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
final class InstanceFactory implements SingletonInterface
{
    use SingletonTrait;


    /**
     * Singleton constructor needs to be written to use trait.
     *
     * It's private because Singleton design pattern means, than we cannot create an instance of the object
     * based on the Singleton in standard way by writing: new Singleton().
     */
    private function __construct()
    {
    }

    /**
     * Returns an instance of the object based on Singleton design pattern
     *
     * @param  string  $className
     * @return SingletonInterface
     * @throws ClassNotFoundException
     */
    public static function getInstance(string $className = self::class): SingletonInterface
    {
        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new ClassNotFoundException('', ClassNotFoundException::EXCEPTION_CODE, $className);
            }

            static::$instance = new self();
        }

        return static::$instance;
    }
}