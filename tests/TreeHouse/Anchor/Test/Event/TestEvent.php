<?php

namespace TreeHouse\Anchor\Test\Event;

use TreeHouse\Anchor\Event\EventInterface;

class TestEvent implements EventInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $data;

    /**
     * @var \DateTime
     */
    public $date;

    /**
     * @param string    $name
     * @param array     $data
     * @param \DateTime $date
     */
    public function __construct($name = 'test', array $data = [], \DateTime $date = null)
    {
        $this->name = $name;
        $this->data = $data;
        $this->date = $date ?: new \DateTime();
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return $this->data;
    }
}
