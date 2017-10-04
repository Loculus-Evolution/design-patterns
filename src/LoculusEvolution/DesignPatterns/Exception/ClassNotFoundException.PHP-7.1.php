<?php
namespace LoculusEvolution\DesignPatterns\Exception;

use Throwable;

/**
 * Class ClassNotFoundException
 * @package LoculusEvolution\DesignPatterns\Exception
 */
class ClassNotFoundException extends \Exception
{
    const EXCEPTION_CODE = 4001;
    const DEFAULT_MESSAGE_TEMPLATE = 'Class %s not found';

    /**
     * @var string
     */
    private $className;

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