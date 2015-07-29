<?php

namespace TreeHouse\Anchor\Tests;

use Mockery\MockInterface;
use TreeHouse\Anchor\Anchor;
use TreeHouse\Anchor\Event\Event;
use TreeHouse\Anchor\Observer\ObserverInterface;
use TreeHouse\Anchor\Test\Observer\NullObserver;

class AnchorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed_with_observers()
    {
        $observers = [
            new NullObserver(),
        ];

        $anchor = new Anchor($observers);

        $this->assertInstanceOf(Anchor::class, $anchor);
        $this->assertSame($observers, $anchor->getObservers());
    }

    /**
     * @test
     */
    public function it_can_add_observers()
    {
        $anchor = new Anchor();

        $this->assertEmpty($anchor->getObservers());

        $anchor->addObserver(new NullObserver());

        $this->assertNotEmpty($anchor->getObservers());
    }

    /**
     * @test
     * @expectedException \LogicException
     */
    public function it_throws_an_exception_for_invalid_observers()
    {
        new Anchor([$this]);
    }

    /**
     * @test
     */
    public function it_reports_to_specific_observers()
    {
        $event = new Event('name', ['foo' => 'bar'], new \DateTime());

        /** @var ObserverInterface|MockInterface $observer1 */
        $observer1 = \Mockery::mock(ObserverInterface::class);
        $observer1->shouldReceive('observes')->once()->andReturn(false);
        $observer1->shouldNotReceive('observe');

        /** @var ObserverInterface|MockInterface $observer2 */
        $observer2 = \Mockery::mock(ObserverInterface::class);
        $observer2->shouldReceive('observes')->once()->andReturn(true);
        $observer2->shouldReceive('observe')->once()->with($event);

        $anchor = new Anchor([$observer1, $observer2]);
        $anchor->report($event);
    }
}
