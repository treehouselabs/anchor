<?php

namespace TreeHouse\Anchor\Event;

class Event implements EventInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $data;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @param string    $name
     * @param array     $data
     * @param \DateTime $date
     */
    public function __construct($name, array $data, \DateTime $date)
    {
        $this->name = $name;
        $this->data = $data;
        $this->date = $date;
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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function getDate()
    {
        return $this->date;
    }
}
