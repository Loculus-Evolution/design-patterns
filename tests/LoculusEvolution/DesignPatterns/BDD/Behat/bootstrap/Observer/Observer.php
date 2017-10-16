<?php
namespace tests\LoculusEvolution\DesignPatterns\BDD\Behat\bootstrap\Observer;

use LoculusEvolution\DesignPatterns\Pattern\Observer\Observer as BaseObserver;
use LoculusEvolution\DesignPatterns\Pattern\Observer\SubjectInterface;

/**
 * Class NamedObserver
 *
 * @package     LoculusEvolution\DesignPatterns\Demo\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class Observer extends BaseObserver
{
    private $id;
    private $name;

    /**
     * @var array
     */
    private $state = [];

    /**
     * Changed object type
     *
     * @var Account
     */
    protected $subject;


    public function __construct($name)
    {
        $this->id = substr(md5(uniqid()), 0, 5);
        $this->name = $name;
    }

    public function update(SubjectInterface $subject)
    {
        /** @var Account $subject */
        $this->state = $subject->getState();
    }

    /**
     * Returns subject's state
     *
     * @return array
     */
    protected function getState(): array
    {
        return $this->state;
    }

    /**
     * Returns string representation of subject's state
     *
     * @return string
     */
    protected function getStateAsString(): string
    {
        $attributesWithValues = [];

        foreach ($this->state as $attribute => $value) {
            $attributesWithValues[] = $attribute . ': ' . $value;
        }

        return implode('; ', $attributesWithValues);
    }
}