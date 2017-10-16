<?php
namespace LoculusEvolution\DesignPatterns\Exception;

use Throwable;

/**
 * Class ClassNotFoundException
 *
 * @package     LoculusEvolution\DesignPatterns\Exception
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class ClassNotFoundException extends \Exception
{
    const EXCEPTION_CODE = 4001;
    const DEFAULT_MESSAGE_TEMPLATE = 'Class %s not found';

    /**
     * @var string
     */
    private $className;


    /**
     * ClassNotFoundException constructor.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable  $className
     * @param  Throwable|null  $previous
     */
    public function __construct(
        $message = '',
        $code = self::EXCEPTION_CODE,
        $className,
        Throwable $previous = null
    )
    {
        if (empty($message)) {
            $message = sprintf(self::DEFAULT_MESSAGE_TEMPLATE, $className);
        }

        parent::__construct($message, $code, $previous);

        $this->className = $className;
    }
}