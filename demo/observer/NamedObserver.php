<?php
namespace LoculusEvolution\DesignPatterns\Demo\Observer;

use LoculusEvolution\DesignPatterns\Pattern\Observer\Observer;
use LoculusEvolution\DesignPatterns\Pattern\Observer\SubjectInterface;

/**
 * Class NamedObserver
 *
 * @package     LoculusEvolution\DesignPatterns\Demo\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class NamedObserver extends Observer
{
    private $id;
    private $name;
    private $value;

    private $state;

    /**
     * Changed object type
     *
     * @var NamedSubject
     */
    protected $subject;


    public function __construct($name)
    {
        $this->id = substr(md5(uniqid()), 0, 5);
        $this->name = $name;
    }

    public function update(SubjectInterface $subject)
    {
        /** @var NamedSubject $subject */
        $this->state = $subject->getState();
        $this->value = $subject->getValue();

        echo $this, PHP_EOL;
    }

    /**
     * Returns string representation of subject's state
     *
     * @return string
     */
    protected function getStateAsString(): string
    {
        if (array_key_exists($this->state, NamedSubject::STATES)) {
            return NamedSubject::STATES[$this->state];
        }

        return NamedSubject::STATE_NAME_UNRECOGNIZED;
    }


    /**
     * Returns string representation of the named subject
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'observer: %s (oid: %s), value: %s, state: %s',
            $this->name,
            $this->id,
            $this->value,
            $this->getStateAsString()
        );
    }
}