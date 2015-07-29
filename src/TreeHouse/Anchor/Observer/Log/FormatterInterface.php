<?php

namespace TreeHouse\Anchor\Observer\Log;

use TreeHouse\Anchor\Event\EventInterface;

interface FormatterInterface
{
    /**
     * @param EventInterface $event
     *
     * @return string
     */
    public function format(EventInterface $event);
}
