<?php

namespace TreeHouse\Anchor\Test\Observer;

use TreeHouse\Anchor\Event\EventInterface;
use TreeHouse\Anchor\Observer\ObserverInterface;

class NullObserver implements ObserverInterface
{
    /**
     * @inheritdoc
     */
    public function observes(EventInterface $event)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function observe(EventInterface $event)
    {
        // noop
    }
}
