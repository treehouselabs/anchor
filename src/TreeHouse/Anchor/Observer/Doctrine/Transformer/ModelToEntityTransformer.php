<?php

namespace TreeHouse\Anchor\Observer\Doctrine\Transformer;

use TreeHouse\Anchor\Event\EventInterface;
use TreeHouse\Anchor\Observer\Doctrine\Entity\Event;

class ModelToEntityTransformer implements TransformerInterface
{
    /**
     * @param EventInterface $event
     *
     * @return Event
     */
    public function transform(EventInterface $event)
    {
        $entity = new Event();
        $entity->setName($event->getName());
        $entity->setDate($event->getDate());
        $entity->setData($event->getData());

        return $entity;
    }
}
