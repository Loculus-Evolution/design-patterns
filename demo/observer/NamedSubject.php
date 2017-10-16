<?php
namespace LoculusEvolution\DesignPatterns\Demo\Observer;

use LoculusEvolution\DesignPatterns\Pattern\Observer\Subject;

/**
 * Class NamedSubject
 *
 * @package     LoculusEvolution\DesignPatterns\Demo\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class NamedSubject extends Subject
{
    const STATE_ACTIVE      = 1;
    const STATE_NOT_ACTIVE  = 0;
    const STATE_DISABLED    = 2;

    const STATE_NAME_ACTIVE         = 'active';
    const STATE_NAME_NOT_ACTIVE     = 'not active';
    const STATE_NAME_DISABLED       = 'disabled';
    const STATE_NAME_UNRECOGNIZED   = 'unrecognized';

    const STATES = [
        self::STATE_ACTIVE      => self::STATE_NAME_ACTIVE,
        self::STATE_NOT_ACTIVE  => self::STATE_NAME_NOT_ACTIVE,
        self::STATE_DISABLED    => self::STATE_NAME_DISABLED,
    ];


    private $id;
    private $name;
    private $value;

    protected $state = self::STATE_NOT_ACTIVE;


    public function __construct($name)
    {
        $this->id = substr(md5(uniqid()), 0, 5);
        $this->name = $name;
    }


    /**
     * Returns value of the named subject instance
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Sets string value for the named subject instance (changes it's state in general)
     *
     * @param  string  $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;

        $this->notify();
    }

    /**
     * Returns string representation of subject's state
     *
     * @return string
     */
    public function getStateAsString(): string
    {
        if (array_key_exists($state = $this->getState(), self::STATES)) {
            return self::STATES[$state];
        }

        return self::STATE_NAME_UNRECOGNIZED;
    }

    /**
     * Sets subject instance active (changes it's state)
     */
    public function setActive()
    {
        $this->state = self::STATE_ACTIVE;

        $this->notify();
    }

    /**
     * Sets subject instance not active (changes it's state)
     */
    public function setNotActive()
    {
        $this->state = self::STATE_NOT_ACTIVE;

        $this->notify();
    }

    /**
     * Sets subject instance disabled (changes it's state)
     */
    public function setDisabled()
    {
        $this->state = self::STATE_DISABLED;

        $this->notify();
    }


    /**
     * Returns string representation of the named subject
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'subject: %s (sid: %s), value: %s, state: %s (%d)',
            $this->name,
            $this->id,
            $this->value,
            $this->getStateAsString(),
            $this->state
        );
    }
}