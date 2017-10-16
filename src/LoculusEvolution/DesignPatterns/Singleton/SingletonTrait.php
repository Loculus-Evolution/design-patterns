<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

use LoculusEvolution\DesignPatterns\Exception\ClassNotFoundException;

/**
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @createdAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
 * @publisedAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
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
                throw new ClassNotFoundException('', ClassNotFoundException::EXCEPTION_CODE, $className);
            }

            static::$instance = $className::getInstance();
        }

        return static::$instance;
    }
}