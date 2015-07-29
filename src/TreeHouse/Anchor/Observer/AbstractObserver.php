<?php

namespace TreeHouse\Anchor\Observer;

use TreeHouse\Anchor\Event\EventInterface;

abstract class AbstractObserver implements ObserverInterface
{
    /**
     * @var array
     */
    private $observedClasses = [];

    /**
     * @param array $classes
     */
    public function setObservedClasses(array $classes)
    {
        $this->observedClasses = $classes;
    }

    /**
     * @inheritdoc
     */
    public function observes(EventInterface $event)
    {
        // by default, everything is observed
        if (empty($this->observedClasses)) {
            return true;
        }

        foreach ($this->observedClasses as $class) {
            if ($event instanceof $class) {
                return true;
            }
        }

        return false;
    }
}
