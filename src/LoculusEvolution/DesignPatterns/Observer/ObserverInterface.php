<?php
namespace LoculusEvolution\DesignPatterns\Observer;

/**
 * Interface ObserverInterface
 *
 * @package     LoculusEvolution\DesignPatterns\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
interface ObserverInterface
{
    /**
     * Attaches observer to the subject and vice-versa.
     * Method returns true if succeed.
     *
     * @param  SubjectInterface $subject
     * @return bool
     */
    public function attach(SubjectInterface $subject): bool;

    /**
     * Detaches observer from the subject and vice-versa if provided subject instance is valid.
     * Method returns true if succeed.
     *
     * @param SubjectInterface $subject
     * @return bool
     */
    public function detach(SubjectInterface $subject): bool;

    /**
     * Updates subject's state called by subject notify() method
     *
     * @param  SubjectInterface $subject
     * @return mixed
     */
    public function update(SubjectInterface $subject);
}
