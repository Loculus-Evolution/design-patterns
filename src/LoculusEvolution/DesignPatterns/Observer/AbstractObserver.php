<?php
namespace LoculusEvolution\DesignPatterns\Observer;

/**
 * Class AbstractObserver
 *
 * @package     LoculusEvolution\DesignPatterns\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
abstract class AbstractObserver implements ObserverInterface
{
    /**
     * Attaches observer to the subject and vice-versa.
     * Method returns true if succeed.
     *
     * @param  SubjectInterface $subject
     * @return bool
     */
    public function attach(SubjectInterface $subject): bool
    {
        return $subject->attach($this);
    }


    /**
     * Detaches observer from the subject and vice-versa if provided subject instance is valid.
     * Method returns true if succeed.
     *
     * @param SubjectInterface $subject
     * @return bool
     */
    public function detach(SubjectInterface $subject): bool
    {
        return $subject->detach($this);
    }


    /**
     * Updates subject's state called by subject notify() method
     *
     * @param  SubjectInterface $subject
     * @return mixed
     */
    abstract public function update(SubjectInterface $subject);
}
