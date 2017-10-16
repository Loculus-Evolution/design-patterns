<?php
namespace LoculusEvolution\DesignPatterns\Observer;

/**
 * Class Subject
 *
 * @package     LoculusEvolution\DesignPatterns\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class Subject extends AbstractSubject
{
    /**
     * @var int
     */
    protected $state = 0;

    /**
     * @inheritdoc
     */
    public function getState(): int
    {
        return $this->state;
    }
}
