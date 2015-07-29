<?php

namespace TreeHouse\Anchor\Test\Observer;

use TreeHouse\Anchor\Event\EventInterface;
use TreeHouse\Anchor\Observer\AbstractObserver;

class TestObserver extends AbstractObserver
{
    /**
     * @inheritdoc
     */
    public function observe(EventInterface $event)
    {
        // noop
    }
}
