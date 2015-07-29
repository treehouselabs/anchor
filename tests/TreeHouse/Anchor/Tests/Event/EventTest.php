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
        $name = 'foo';
        $data = ['foo' => 'bar'];
        $date = new \DateTime();

        $event = new Event($name, $data, $date);

        $this->assertInstanceOf(EventInterface::class, $event);

        $this->assertSame($name, $event->getName());
        $this->assertSame($data, $event->getData());
        $this->assertSame($date, $event->getDate());
    }
}
