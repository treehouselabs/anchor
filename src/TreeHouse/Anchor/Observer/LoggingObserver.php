<?php

namespace TreeHouse\Anchor\Observer;

use Psr\Log\LoggerInterface;
use TreeHouse\Anchor\Event\EventInterface;
use TreeHouse\Anchor\Observer\Log\Formatter;
use TreeHouse\Anchor\Observer\Log\FormatterInterface;

class LoggingObserver extends AbstractObserver
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @param LoggerInterface    $logger
     * @param FormatterInterface $formatter
     */
    public function __construct(LoggerInterface $logger, FormatterInterface $formatter = null)
    {
        $this->logger = $logger;
        $this->formatter = $formatter ?: new Formatter();
    }

    /**
     * @inheritdoc
     */
    public function observe(EventInterface $event)
    {
        $this->logger->info($this->formatter->format($event), $event->getData());
    }
}
