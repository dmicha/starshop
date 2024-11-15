<?php

namespace App\Tests\Repository;

use App\Entity\ShipStatus;
use App\Repository\ShipStatusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;

class ShipStatusRepositoryTest extends TestCase
{
    private ShipStatusRepository $repository;
    private ManagerRegistry $managerRegistry;
    private EntityManagerInterface $entityManager;
    private ClassMetadata $classMetadata;

    protected function setUp(): void
    {
        $this->classMetadata = new ClassMetadata(ShipStatus::class); // Upewnij się, że mamy metadane
        $this->managerRegistry = $this->createMock(ManagerRegistry::class);
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        
        $this->entityManager->method('getClassMetadata')->willReturn($this->classMetadata); // Dodanie metadanych
        $this->managerRegistry->method('getManagerForClass')->willReturn($this->entityManager);
        
        $this->repository = new ShipStatusRepository($this->managerRegistry);
    }

    public function testRepositoryIsCreated(): void
    {
        $this->assertInstanceOf(ShipStatusRepository::class, $this->repository);
    }

    public function testFindReturnsNullForNonExistingEntity(): void
    {
        $this->entityManager->method('find')->willReturn(null);

        $result = $this->repository->find(999); // Załóż, że ten ID nie istnieje
        $this->assertNull($result);
    }

    // Możesz dodać więcej testów dla metod takich jak findAll, findBy, itd.
}
