<?php

namespace TreeHouse\Anchor;

use TreeHouse\Anchor\Event\EventInterface;
use TreeHouse\Anchor\Observer\ObserverInterface;

class Anchor
{
    /**
     * @var ObserverInterface[]
     */
    private $observers;

    /**
     * @param ObserverInterface[] $observers
     */
    public function __construct(array $observers = [])
    {
        // walk through the items to check every member is an observer
        array_walk($observers, function ($observer) {
            if (!$observer instanceof ObserverInterface) {
                throw new \LogicException(
                    sprintf(
                        'Observer of class "%s" does not implement "%s"',
                        get_class($observer),
                        ObserverInterface::class
                    )
                );
            }
        });

        $this->observers = $observers;
    }

    /**
     * @param ObserverInterface $observer
     */
    public function addObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * @return ObserverInterface[]
     */
    public function getObservers()
    {
        return $this->observers;
    }

    /**
     * @param EventInterface $event
     */
    public function report(EventInterface $event)
    {
        $observers = $this->getEventObservers($event);

        foreach ($observers as $observer) {
            $observer->observe($event);
        }
    }

    /**
     * @param EventInterface $event
     *
     * @return ObserverInterface[]
     */
    protected function getEventObservers(EventInterface $event)
    {
        foreach ($this->observers as $observer) {
            if ($observer->observes($event)) {
                yield $observer;
            }
        }
    }
}
