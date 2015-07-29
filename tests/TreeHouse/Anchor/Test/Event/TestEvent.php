<?php

namespace TreeHouse\Anchor\Test\Event;

use TreeHouse\Anchor\Event\EventInterface;

class TestEvent implements EventInterface
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return ['foo' => 'bar'];
    }

    /**
     * @inheritdoc
     */
    public function getDate()
    {
        return new \DateTime();
    }
}
