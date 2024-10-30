<?php

namespace App\Tests\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use App\Model\StarshipStatusEnum;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class StarshipApiControllerTest extends WebTestCase
{
    public function testGetCollectionReturnsStarships()
    {
        $client = static::createClient();
    
        // Tworzymy mock repozytorium
        $repositoryMock = $this->createMock(StarshipRepository::class);
    
        // Przykładowe dane dla Starship (upewnij się, że status jest poprawnie ustawiony)
        $starship1 = new Starship(1, 'X-Wing', 'Fighter', 'Luke Skywalker', StarshipStatusEnum::WAITING);
        $starship2 = new Starship(2, 'Millennium Falcon', 'Freighter', 'Han Solo', StarshipStatusEnum::IN_PROGRESS);
    
        $repositoryMock->method('findAll')->willReturn([$starship1, $starship2]);
    
        // Wstrzykiwanie mocka repozytorium do kontenera
        static::getContainer()->set(StarshipRepository::class, $repositoryMock);
    
        // Wysyłamy żądanie GET do endpointu API
        $client->request('GET', '/api/starships');
    
        // Sprawdzamy, czy odpowiedź HTTP jest poprawna (200 OK)
        $this->assertResponseIsSuccessful();
    
        // Sprawdzamy zawartość JSON
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertCount(2, $responseData);
        $this->assertEquals('X-Wing', $responseData[0]['name']);
        $this->assertEquals('Millennium Falcon', $responseData[1]['name']);
    }
    
    public function testGetReturnsStarshipIfExists()
    {
        $client = static::createClient();
    
        // Tworzymy mock repozytorium
        $repositoryMock = $this->createMock(StarshipRepository::class);
    
        // Tworzymy przykładowy statek
        $starship = new Starship(1, 'X-Wing', 'Fighter', 'Luke Skywalker', StarshipStatusEnum::WAITING);
    
        // Repozytorium zwraca dany statek
        $repositoryMock->method('find')->willReturn($starship);
    
        // Wstrzykiwanie mocka repozytorium do kontenera
        static::getContainer()->set(StarshipRepository::class, $repositoryMock);
    
        // Wysyłamy żądanie GET do endpointu dla istniejącego statku
        $client->request('GET', '/api/starships/1');
    
        // Sprawdzamy, czy odpowiedź HTTP jest poprawna (200 OK)
        $this->assertResponseIsSuccessful();
    
        // Sprawdzamy zawartość JSON
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('X-Wing', $responseData['name']);
    }
    public function testGetReturnsNotFoundIfStarshipDoesNotExist()
    {
        $client = static::createClient();
    
        // Tworzymy mock repozytorium
        $repositoryMock = $this->createMock(StarshipRepository::class);
    
        // Repozytorium zwraca null dla nieistniejącego statku
        $repositoryMock->method('find')->willReturn(null);
    
        // Wstrzykiwanie mocka repozytorium do kontenera
        static::getContainer()->set(StarshipRepository::class, $repositoryMock);
    
        // Wysyłamy żądanie GET do endpointu dla nieistniejącego statku
        $client->request('GET', '/api/starships/999'); // Przykładowe ID, które nie istnieje
    
        // Sprawdzamy, czy odpowiedź HTTP jest błędem 404
        $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
    
        // Opcjonalnie: Możesz także sprawdzić, czy zawartość odpowiedzi zawiera komunikat
        $this->assertStringContainsString('Starship not found', $client->getResponse()->getContent());
    }

    
}
