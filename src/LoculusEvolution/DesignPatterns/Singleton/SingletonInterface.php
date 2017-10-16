<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

/**
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @publisedAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
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