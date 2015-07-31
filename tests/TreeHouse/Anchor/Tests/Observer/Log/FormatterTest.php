<?php

namespace TreeHouse\Anchor\Tests\Observer\Log;

use TreeHouse\Anchor\Event\Event;
use TreeHouse\Anchor\Observer\Log\Formatter;

class FormatterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_formats_with_default_date_format()
    {
        $date = '2015-07-29 13:55:00';

        $formatter = new Formatter();
        $event = new Event([], new \DateTime($date));

        $this->assertSame('[2015-07-29 13:55:00] ' . $event->getName(), $formatter->format($event));
    }

    /**
     * @test
     */
    public function it_formats_with_custom_date_format()
    {
        $date = new \DateTime();
        $format = DATE_COOKIE;

        $formatter = new Formatter($format);
        $event = new Event([], $date);

        $this->assertSame(
            sprintf('[%s] %s', $date->format($format), $event->getName()),
            $formatter->format($event)
        );
    }
}
