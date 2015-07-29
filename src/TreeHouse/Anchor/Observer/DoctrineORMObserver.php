<?php

namespace TreeHouse\Anchor\Observer;

use Doctrine\Common\Persistence\ManagerRegistry;
use TreeHouse\Anchor\Event\EventInterface;
use TreeHouse\Anchor\Observer\Doctrine\Transformer\TransformerInterface;

class DoctrineORMObserver extends AbstractObserver
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * @var TransformerInterface
     */
    private $transformer;

    /**
     * @param ManagerRegistry      $doctrine
     * @param TransformerInterface $transformer
     */
    public function __construct(ManagerRegistry $doctrine, TransformerInterface $transformer)
    {
        $this->doctrine = $doctrine;
        $this->transformer = $transformer;
    }

    /**
     * @inheritdoc
     */
    public function observe(EventInterface $event)
    {
        // convert into entity
        $entity = $this->transformer->transform($event);

        $manager = $this->doctrine->getManagerForClass(get_class($entity));
        $manager->persist($entity);
        $manager->flush($entity);
    }
}
