<?php
namespace LoculusEvolution\DesignPatterns\Observer;

/**
 * Class Observer
 *
 * @package     LoculusEvolution\DesignPatterns\Observer
 * @license     New BSD License
 * @copyright   Copyright (c) 2017 Tomasz Evolic Kuter. (http://www.tomaszkuter.com)
 * @author      Tomasz Kuter <tkuter@loculus.pl>
 */
class Observer extends AbstractObserver
{
    /**
     * Updates subject's state called by subject notify() method
     *
     * @param  SubjectInterface $subject
     * @return mixed
     */
    public function update(SubjectInterface $subject)
    {
        // @todo put some method body here
    }
}
