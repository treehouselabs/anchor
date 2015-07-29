<?php

namespace TreeHouse\Anchor\Tests;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Mockery\MockInterface;
use TreeHouse\Anchor\Observer\DoctrineORMObserver;
use TreeHouse\Anchor\Observer\Doctrine\Entity\Event;
use TreeHouse\Anchor\Observer\Doctrine\Transformer\TransformerInterface;
use TreeHouse\Anchor\Observer\ObserverInterface;
use TreeHouse\Anchor\Test\Event\TestEvent;

class DoctrineORMObserverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed()
    {
        $doctrine = $this->createDoctrineMock();
        $transformer = $this->createTransformerMock();

        $observer = new DoctrineORMObserver($doctrine, $transformer);

        $this->assertInstanceOf(ObserverInterface::class, $observer);
    }

    /**
     * @test
     */
    public function it_persists_an_event()
    {
        $event = new TestEvent();
        $entity = new Event();

        $transformer = $this->createTransformerMock();
        $transformer
            ->shouldReceive('transform')
            ->once()
            ->with($event)
            ->andReturn($entity)
        ;

        $manager = $this->createEntityManagerMock();
        $manager->shouldReceive('persist')->with($entity)->once();
        $manager->shouldReceive('flush')->with($entity)->once();

        $doctrine = $this->createDoctrineMock();
        $doctrine->shouldReceive('getManagerForClass')->andReturn($manager);

        $observer = new DoctrineORMObserver($doctrine, $transformer);
        $observer->observe($event);

        $this->assertInstanceOf(ObserverInterface::class, $observer);
    }

    /**
     * @return MockInterface|TransformerInterface
     */
    private function createTransformerMock()
    {
        return \Mockery::mock(TransformerInterface::class);
    }

    /**
     * @return MockInterface|ManagerRegistry
     */
    private function createDoctrineMock()
    {
        return \Mockery::mock(ManagerRegistry::class);
    }

    /**
     * @return MockInterface|EntityManagerInterface
     */
    private function createEntityManagerMock()
    {
        return \Mockery::mock(EntityManagerInterface::class);
    }
}
