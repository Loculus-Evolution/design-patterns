<?php
namespace LoculusEvolution\DesignPatterns\Observer;

/**
 * Interface SubjectInterface
 *
 * @package     LoculusEvolution\DesignPatterns\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
interface SubjectInterface
{
    /**
     * Attaches observer to the subject and not vice-versa.
     * Method returns true if succeed.
     *
     * @param  ObserverInterface $observer
     * @return bool
     */
    public function attach(ObserverInterface $observer): bool;

    /**
     * Detaches observer from the subject and not vice-versa if provided subject instance is valid.
     * Method returns true if succeed.
     *
     * @param ObserverInterface $observer
     * @return bool
     */
    public function detach(ObserverInterface $observer): bool;

    /**
     * Notifies all attached observer, when subject change it's state
     */
    public function notify();

    /**
     * Returns subject's state as integer.
     *
     * @return int
     */
    public function getState(): int;
}
