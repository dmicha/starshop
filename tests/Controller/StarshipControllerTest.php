<?php

namespace App\Tests\Controller;

use App\Entity\Ships;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StarshipControllerTest extends WebTestCase
{
    public function testShowReturnsShipIfFound()
    {
        // Tworzymy klienta i mock dla EntityManager
        $client = static::createClient();
        $entityManager = $this->createMock(EntityManagerInterface::class);
        
        // Mockowanie repozytorium i zwracanie przykładowego statku
        $ship = new Ships();
        $ship->setName('X-Wing');

        $repositoryMock = $this->createMock(EntityRepository::class);
        $repositoryMock->method('find')->willReturn($ship);

        $entityManager->method('getRepository')->willReturn($repositoryMock);

        // Wstrzykiwanie zmockowanego EntityManagera do kontenera
        static::getContainer()->set(EntityManagerInterface::class, $entityManager);

        // Wysyłanie żądania GET do trasy kontrolera
        $client->request('GET', '/starships/1');

        // Sprawdzanie odpowiedzi
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'X-Wing');  // Zakładamy, że nazwa statku jest w tagu <h1>
    }

    public function testShowThrowsExceptionIfShipNotFound()
    {
        // Tworzymy klienta i mock dla EntityManager
        $client = static::createClient();
        $entityManager = $this->createMock(EntityManagerInterface::class);

        // Mockowanie repozytorium i zwracanie wartości null, gdy statek nie zostanie znaleziony
        $repositoryMock = $this->createMock(EntityRepository::class);
        $repositoryMock->method('find')->willReturn(null);

        $entityManager->method('getRepository')->willReturn($repositoryMock);

        // Wstrzykiwanie zmockowanego EntityManagera do kontenera
        static::getContainer()->set(EntityManagerInterface::class, $entityManager);

        // Wysyłanie żądania GET do trasy kontrolera dla nieistniejącego statku
        $client->request('GET', '/starships/999');

        // Sprawdzanie, czy odpowiedź zawiera wyjątek 404
        $this->assertResponseStatusCodeSame(404);
    }
}
