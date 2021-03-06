<?php

namespace TreeHouse\Anchor\Event;

interface EventInterface
{
    /**
     * Returns the canonical event name.
     *
     * @return string
     */
    public function getName();

    /**
     * Returns the data associated with the event.
     * Note that this data must be serializable!
     *
     * @return array
     */
    public function getData();

    /**
     * Returns the date this event happened.
     *
     * @return \DateTime
     */
    public function getDate();
}
