<?php

namespace App\Tests\Entity;

use App\Entity\ShipStatus;
use PHPUnit\Framework\TestCase;

class ShipStatusTest extends TestCase
{
    public function testInitialValues()
    {
        $shipStatus = new ShipStatus();
        
        // Sprawdzamy domyślne wartości
        $this->assertNull($shipStatus->getId());
        $this->assertNull($shipStatus->getIdShip());
        $this->assertNull($shipStatus->getStatus());
    }

    public function testSetAndGetId()
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setId(1);
        $this->assertEquals(1, $shipStatus->getId());
    }

    public function testSetAndGetIdShip(): void
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setIdShip(123);
    
        $this->assertEquals(123, $shipStatus->getIdShip());
    }

    public function testSetAndGetStatus()
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setStatus('In Service');
        $this->assertEquals('In Service', $shipStatus->getStatus());

        // Sprawdzamy ustawienie wartości null
        $shipStatus->setStatus(null);
        $this->assertNull($shipStatus->getStatus());
    }

    public function testSetIdToInvalidValue()
    {
        $this->expectException(\TypeError::class); // Spodziewamy się błędu typu
        $shipStatus = new ShipStatus();
        $shipStatus->setId('not an integer'); // Błąd, ponieważ id powinno być int
    }
}
