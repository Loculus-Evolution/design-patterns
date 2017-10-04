<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

/**
 * Simple singleton final class.
 *
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @createdAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
 */
final class Singleton extends AbstractSingleton
{
    /**
     * Singleton constructor.
     *
     * It's private because singleton design pattern means, than we cannot create an instance of the object
     * based on the singleton in standard way by new Singleton().
     */
    private function __construct()
    {
    }

    /**
     * Returns an instance of the object based on singleton design pattern
     *
     * @param  string  $className  Class name
     * @return singletonInterface
     */
    public static function getInstance(string $className = self::class): singletonInterface
    {
//        echo __METHOD__, PHP_EOL;
//        echo $className, PHP_EOL;

        if (is_null(static::$instance)) {
            if (! class_exists($className)) {
                throw new ClassNotFoundException();
            }

            static::$instance = new $className();
        }

//        echo 'exit getInstance().', PHP_EOL;

        return static::$instance;
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
}