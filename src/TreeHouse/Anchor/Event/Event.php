<?php

namespace TreeHouse\Anchor\Event;

/**
 * Generic event class
 */
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
     * @param array     $data
     * @param \DateTime $date
     */
    public function __construct(array $data = [], \DateTime $date = null)
    {
        $this->data = $data;
        $this->date = $date ?: new \DateTime();
        $this->name = $this->canonicalizeName(substr(static::class, strrpos(static::class, '\\') + 1));
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

    /**
     * @param string $name
     *
     * @return string
     */
    private function canonicalizeName($name)
    {
        // make snake_case, using a period as separator
        $name = strtolower(preg_replace('~(?<=\\w)([A-Z])~', '.$1', $name));

        // strip trailing .event, in case the event class is suffixed
        $name = preg_replace('/\.event$/', '', $name);

        return $name;
    }
}
