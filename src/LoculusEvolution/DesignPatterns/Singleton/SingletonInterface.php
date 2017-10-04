<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

/**
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @publisedAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
 */
interface iSingleton
{
    /**
     * Returns an instance of the object based on singleton design pattern
     *
     * @param  string  $className  Class name
     * @return iSingleton
     */
    public function getInstance(string $className = Singleton::class): iSingleton;
}