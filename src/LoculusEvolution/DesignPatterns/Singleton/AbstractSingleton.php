<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

/**

 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @publisedAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
 */
abstract class AbstractSingleton implements SingletonInterface
{
    /**
     * An instance of the object based on singleton design pattern
     *
     * @var singletonInterface
     */
    protected static $instance;

    /**
     * Returns an instance of the object based on singleton design pattern
     *
     * @param  string  $className  Class name
     * @return singletonInterface
     */
    abstract public static function getInstance(string $className = Singleton::class): singletonInterface;
}