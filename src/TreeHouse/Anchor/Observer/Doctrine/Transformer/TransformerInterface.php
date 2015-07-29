<?php

namespace TreeHouse\Anchor\Observer\Doctrine\Transformer;

use TreeHouse\Anchor\Event\EventInterface;
use TreeHouse\Anchor\Observer\Doctrine\Entity\Event;

interface TransformerInterface
{
    /**
     * @param EventInterface $event
     *
     * @return Event
     */
    public function transform(EventInterface $event);
}
