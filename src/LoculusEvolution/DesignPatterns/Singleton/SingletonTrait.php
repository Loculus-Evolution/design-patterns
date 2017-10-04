<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

use LoculusEvolution\DesignPatterns\ClassNotFoundException;

/**

 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @publisedAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
 */

trait tSingleton
{
    /**
     * @var iSingleton
     */
    private static $instance;

    /**
     * @param  string  $className
     * @return iSingleton
     */
    public function getInstance(string $className = Singleton::class): iSingleton
    {
        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new ClassNotFoundException();
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