<?php

namespace TreeHouse\Anchor\Observer;

use TreeHouse\Anchor\Event\EventInterface;

interface ObserverInterface
{
    /**
     * @param EventInterface $event
     *
     * @return bool
     */
    public function observes(EventInterface $event);

    /**
     * @param EventInterface $event
     */
    public function observe(EventInterface $event);
}
