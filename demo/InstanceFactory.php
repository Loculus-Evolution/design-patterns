<?php
namespace LoculusEvolution\DesignPatterns\Singleton;

use LoculusEvolution\DesignPatterns\Singleton\SingletonTrait;

/**
 * Simple singleton final class.
 *
 * @licence MIT
 * @author Tomasz Kuter <tkuter@loculus.pl>
 * @createdAt 2017-10-03 00L39S59 Europe/Poland.LesserPoland/Cracow
 */
final class InstanceFactory implements SingletonInterface
{
    use SingletonTrait;
}