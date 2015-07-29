<?php

namespace TreeHouse\Anchor\Observer\Log;

use TreeHouse\Anchor\Event\EventInterface;

class Formatter implements FormatterInterface
{
    /**
     * @var string
     */
    private $format;

    /**
     * @param string $format
     */
    public function __construct($format = 'Y-m-d H:i:s')
    {
        $this->format = $format;
    }

    /**
     * @inheritdoc
     */
    public function format(EventInterface $event)
    {
        return sprintf(
            '[%s] %s',
            $event->getDate()->format($this->format),
            $event->getName()
        );
    }
}
