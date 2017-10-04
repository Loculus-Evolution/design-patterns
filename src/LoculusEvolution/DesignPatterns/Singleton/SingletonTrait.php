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
     * @var singletonInterface
     */
    private static $instance;

    /**
     *
     *
     * @param  string  $className
     * @return singletonInterface
     */
    public static function getInstance(string $className = Singleton::class): singletonInterface
    {
        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new ClassNotFoundException($className);
            }

            static::$instance = $className::getInstance();
        }

        return static::$instance;
    }


    final private function __construct()
    {
    }

    final private function __clone()
    {
    }
}