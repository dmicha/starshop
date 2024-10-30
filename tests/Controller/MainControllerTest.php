<?php
namespace App\Tests\Controller;

use App\Entity\Ships;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testHomepageRendersCorrectly()
    {
        // Tworzenie klienta do symulacji żądań HTTP
        $client = static::createClient();

        // Mockowanie EntityManager i Repozytorium
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $repositoryMock = $this->createMock(EntityRepository::class);

        // Przykładowe dane statków z ID i innymi atrybutami
        $ship1 = new Ships();
        $ship1->setName('X-Wing');
        $ship1->setId(1);
        $ship1->setCaptain('Luke Skywalker');
        $ship1->setClass('Fighter');

        $ship2 = new Ships();
        $ship2->setName('Millennium Falcon');
        $ship2->setId(2);
        $ship2->setCaptain('Han Solo');
        $ship2->setClass('Freighter');

        // Mockowanie repozytorium, aby zwracało te statki
        $repositoryMock->method('findAll')->willReturn([$ship1, $ship2]);
        $entityManager->method('getRepository')->willReturn($repositoryMock);

        // Wstrzykiwanie mockowanego EntityManager do kontenera Symfony
        static::getContainer()->set(EntityManagerInterface::class, $entityManager);

        // Wykonanie żądania GET do strony głównej
        $client->request('GET', '/');

        // Sprawdzenie, czy odpowiedź jest udana
        $this->assertResponseIsSuccessful();

        // Inicjalizacja crawlera z odpowiedzi
        $crawler = $client->getCrawler();

        // Sprawdzanie, czy strona zawiera zarówno "X-Wing", jak i "Millennium Falcon"
        $h4Elements = $crawler->filter('h4');

        // Upewnienie się, że mamy 2 elementy h4
        $this->assertCount(2, $h4Elements); 
        $this->assertEquals('X-Wing', trim($h4Elements->eq(0)->text())); // Porównanie pierwszego h4
        $this->assertEquals('Millennium Falcon', trim($h4Elements->eq(1)->text())); // Porównanie drugiego h4
    }
}
