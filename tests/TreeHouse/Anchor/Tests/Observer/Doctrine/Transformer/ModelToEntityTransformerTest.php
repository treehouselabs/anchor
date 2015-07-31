<?php

namespace TreeHouse\Anchor\Tests\Observer\Doctrine\Transformer;

use TreeHouse\Anchor\Event\Event;
use TreeHouse\Anchor\Observer\Doctrine\Transformer\ModelToEntityTransformer;
use TreeHouse\Anchor\Observer\Doctrine\Transformer\TransformerInterface;

class ModelToEntityTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed()
    {
        $transformer = new ModelToEntityTransformer();

        $this->assertInstanceOf(TransformerInterface::class, $transformer);
    }

    /**
     * @test
     */
    public function it_transforms_an_event()
    {
        $data = ['foo' => 'bar'];
        $date = new \DateTime();

        $event = new Event($data, $date);

        $entity = (new ModelToEntityTransformer())->transform($event);

        $this->assertSame($event->getName(), $entity->getName(), '->getName() should return the name');
        $this->assertSame($data, $entity->getData(), '->getData() should return the data');
        $this->assertSame($date, $entity->getDate(), '->getDate() should return the date');
    }
}
