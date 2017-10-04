<?php
namespace LoculusEvolution\DesignPatterns\Exception;

use Throwable;

/**
 * Class ClassNotFoundException
 * @package LoculusEvolution\DesignPatterns\Exception
 */
exception ClassNotFoundException
{
    private $className;

    public function __construct($message = "", $code = 0, $className, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->$className = $className;
    }
}