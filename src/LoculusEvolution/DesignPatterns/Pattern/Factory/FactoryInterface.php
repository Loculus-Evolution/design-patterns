<?php
namespace LoculusEvolution\DesignPatterns\Pattern\Factory;

interface FactoryInterface
{
    /**
     * Returns an instance of the certain class/type
     *
     * @param  string  $type
     * @return FactoryProductInterface
     */
    public static function factory(string $type);
}