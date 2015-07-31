<?php

namespace TreeHouse\Anchor\Tests\Observer\Doctrine\Entity;

use TreeHouse\Anchor\Observer\Doctrine\Entity\Event;

class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_get_and_set_properties()
    {
        $event = new Event();

        $uuid = uniqid();
        $name = 'foo';
        $data = ['foo' => 'bar'];
        $date = new \DateTime();

        $this->assertSame($event, $event->setUuid($uuid), '->setUuid() should be chainable');
        $this->assertSame($uuid, $event->getUuid(), '->getUuid() should return the uuid');

        $this->assertSame($event, $event->setName($name), '->setName() should be chainable');
        $this->assertSame($name, $event->getName(), '->getName() should return the name');

        $this->assertSame($event, $event->setData($data), '->setData() should be chainable');
        $this->assertSame($data, $event->getData(), '->getData() should return the data');

        $this->assertSame($event, $event->setDate($date), '->setDate() should be chainable');
        $this->assertSame($date, $event->getDate(), '->getDate() should return the date');
    }
}
