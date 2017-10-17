<?php
namespace LoculusEvolution\DesignPatterns\Pattern\Factory;


abstract class AbstractFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    abstract public static function factory(string $type);
}