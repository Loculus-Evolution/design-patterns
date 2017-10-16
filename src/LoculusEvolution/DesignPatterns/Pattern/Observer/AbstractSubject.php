<?php
namespace LoculusEvolution\DesignPatterns\Pattern\Observer;

/**
 * Class AbstractSubject
 *
 * @package     LoculusEvolution\DesignPatterns\Pattern\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
abstract class AbstractSubject implements SubjectInterface
{
    /**
     * @var ObserverInterface[]
     */
    protected $observers = [];


    /**
     * Attaches observer to the subject and not vice-versa.
     * Method returns true if succeed.
     *
     * @param  ObserverInterface $observer
     * @return bool
     */
    public function attach(ObserverInterface $observer): bool
    {
        $id = spl_object_hash($observer);

        if (! array_key_exists($id, $this->observers)) {
            $this->observers[$id] = $observer;

            return true;
        }

        return false;
    }

    /**
     * Detaches observer from the subject and not vice-versa if provided subject instance is valid.
     * Method returns true if succeed.
     *
     * @param ObserverInterface $observer
     * @return bool
     */
    public function detach(ObserverInterface $observer): bool
    {
        $id = spl_object_hash($observer);

        if (array_key_exists($id, $this->observers)) {
            unset($this->observers[$id]);

            return true;
        }

        return false;
    }

    /**
     * Notifies all attached observer, when subject change it's state
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
