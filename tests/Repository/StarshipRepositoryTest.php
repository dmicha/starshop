<?php

namespace App\Tests\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
use App\Repository\StarshipRepository;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class StarshipRepositoryTest extends TestCase {
    private StarshipRepository $repository;
    private LoggerInterface $logger;

    protected function setUp(): void {
        // Mockowanie loggera
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->repository = new StarshipRepository($this->logger);
    }

    public function testFindAll(): void {
        // Upewnij się, że logger został wywołany
        $this->logger->expects($this->once())
            ->method('info')
            ->with('Starship collection retrived');

        // Testuj metodę findAll
        $starships = $this->repository->findAll();

        $this->assertCount(3, $starships);

        $this->assertInstanceOf(Starship::class, $starships[0]);
        $this->assertEquals(1, $starships[0]->getId());
        $this->assertEquals('USS LeafyCruiser (NCC-0001)', $starships[0]->getName());
        $this->assertEquals(StarshipStatusEnum::IN_PROGRESS, $starships[0]->getStatus());

        $this->assertInstanceOf(Starship::class, $starships[1]);
        $this->assertEquals(2, $starships[1]->getId());
        $this->assertEquals('USS Espresso (NCC-1234-C)', $starships[1]->getName());
        $this->assertEquals(StarshipStatusEnum::COMPLETED, $starships[1]->getStatus());

        $this->assertInstanceOf(Starship::class, $starships[2]);
        $this->assertEquals(3, $starships[2]->getId());
        $this->assertEquals('USS Wanderlust (NCC-2024-W)', $starships[2]->getName());
        $this->assertEquals(StarshipStatusEnum::WAITING, $starships[2]->getStatus());
    }

    public function testFind(): void {
        // Testuj metodę find dla istniejącego statku
        $starship = $this->repository->find(1);
        $this->assertInstanceOf(Starship::class, $starship);
        $this->assertEquals(1, $starship->getId());

        // Testuj metodę find dla nieistniejącego statku
        $starship = $this->repository->find(99);
        $this->assertNull($starship);
    }
}
