<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

/**

 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @publisedAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
 */

trait tSingleton
{
    /**
     * @var,tSingleton
     */
    private static $instance;

    public function getInstance(): iSingleton
    {
        if (is_null(static::$instance)) {
            static::$instance = new tSingleton();
        }

        return static::$instance;
    }

    private function __clone()
    {
    }
}