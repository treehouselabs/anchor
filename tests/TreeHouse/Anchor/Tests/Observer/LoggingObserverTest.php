<?php

namespace TreeHouse\Anchor\Tests\Observer;

use Mockery\MockInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use TreeHouse\Anchor\Event\Event;
use TreeHouse\Anchor\Observer\Log\FormatterInterface;
use TreeHouse\Anchor\Observer\LoggingObserver;
use TreeHouse\Anchor\Observer\ObserverInterface;

class LoggingObserverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed()
    {
        $observer = new LoggingObserver(new NullLogger());

        $this->assertInstanceOf(ObserverInterface::class, $observer);
    }

    /**
     * @test
     */
    public function it_logs_a_message()
    {
        $data = ['foo' => 'bar'];
        $event = new Event($data, new \DateTime());

        /** @var LoggerInterface|MockInterface $logger */
        $logger = \Mockery::mock(LoggerInterface::class);
        $logger
            ->shouldReceive('info')
            ->once()
            ->with(containsString($event->getName()), arrayContaining($data))
        ;

        $observer = new LoggingObserver($logger);
        $observer->observe($event);
    }

    /**
     * @test
     */
    public function it_can_use_a_custom_format()
    {
        $data = ['foo' => 'bar'];
        $event = new Event($data, new \DateTime());

        /* @var FormatterInterface|MockInterface $logger */
        $formatter = \Mockery::mock(FormatterInterface::class);
        $formatter->shouldReceive('format')->andReturn('foo');

        /** @var LoggerInterface|MockInterface $logger */
        $logger = \Mockery::mock(LoggerInterface::class);
        $logger
            ->shouldReceive('info')
            ->once()
            ->with('foo', arrayContaining($data))
        ;

        $observer = new LoggingObserver($logger, $formatter);
        $observer->observe($event);
    }
}
