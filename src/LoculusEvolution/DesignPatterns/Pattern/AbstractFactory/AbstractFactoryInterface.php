<?php
namespace LoculusEvolution\DesignPatterns\Pattern\AbstractFactory;

interface AbstractFactoryInterface
{
    /**
     * Returns class instance made by factory for provided type
     *
     * @param  string $type
     * @param  array  $config
     * @return ServiceInterface
     */
    public static function factory(string $type, array $config);
}