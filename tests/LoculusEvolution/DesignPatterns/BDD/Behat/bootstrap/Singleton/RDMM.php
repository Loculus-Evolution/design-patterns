<?php
namespace tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Singleton;

use LoculusEvolution\DesignPatterns\Singleton;
use LoculusEvolution\DesignPatterns\Exception\ClassNotFoundException;

/**
 * RDMM class implementing Singleton design pattern by extending abstract class.
 *
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @createdAt 2017-10-16T08M12S59, Europe/Krakow
 */
final class RDMM extends Singleton\AbstractSingleton
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
     * @return Singleton\SingletonInterface
     * @throws ClassNotFoundException
     */
    public static function getInstance(string $className = self::class): Singleton\SingletonInterface
    {
        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new ClassNotFoundException('', ClassNotFoundException::EXCEPTION_CODE, $className);
            }

            static::$instance = new $className();
        }

        return static::$instance;
    }
}