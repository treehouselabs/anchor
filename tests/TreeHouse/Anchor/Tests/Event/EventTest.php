<?php

namespace TreeHouse\Anchor\Tests\Event;

use TreeHouse\Anchor\Event\Event;
use TreeHouse\Anchor\Event\EventInterface;

class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed_with_arguments()
    {
        $data = ['foo' => 'bar'];
        $date = new \DateTime();

        $event = new Event($data, $date);

        $this->assertInstanceOf(EventInterface::class, $event);

        $this->assertSame('event', $event->getName());
        $this->assertSame($data, $event->getData());
        $this->assertSame($date, $event->getDate());
    }

    /**
     * @test
     */
    public function it_auto_canonicalizes_the_name()
    {
        $event = new MyCustomEvent();

        $this->assertSame('my.custom', $event->getName());
    }
}

class MyCustomEvent extends Event
{
}
