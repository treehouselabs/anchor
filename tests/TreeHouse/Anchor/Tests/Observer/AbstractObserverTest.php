<?php

namespace TreeHouse\Anchor\Tests\Observer;

use Mockery\MockInterface;
use TreeHouse\Anchor\Event\Event;
use TreeHouse\Anchor\Observer\AbstractObserver;
use TreeHouse\Anchor\Test\Event\TestEvent;

class AbstractObserverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_observes_everything_by_default()
    {
        /** @var AbstractObserver|MockInterface $observer */
        $observer = \Mockery::mock(AbstractObserver::class);
        $observer->makePartial();

        $this->assertTrue($observer->observes(new Event('test', [], new \DateTime())));
        $this->assertTrue($observer->observes(new TestEvent()));
    }

    /**
     * @test
     */
    public function it_observes_specific_classes()
    {
        /** @var AbstractObserver|MockInterface $observer */
        $observer = \Mockery::mock(AbstractObserver::class);
        $observer->makePartial();
        $observer->setObservedClasses([Event::class]);

        $this->assertTrue($observer->observes(new Event('test', [], new \DateTime())));
        $this->assertFalse($observer->observes(new TestEvent()));
    }
}
