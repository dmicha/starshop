<?php

namespace App\Tests\Entity;

use App\Entity\ShipStatus;
use PHPUnit\Framework\TestCase;

class ShipStatusTest extends TestCase
{
    public function testSetAndGetId()
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setId(1);

        $this->assertEquals(1, $shipStatus->getId());
    }

    public function testSetAndGetIdShip()
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setIdShip(2);

        $this->assertEquals(2, $shipStatus->getIdShip());
    }

    public function testSetAndGetStatus()
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setStatus('In Service');

        $this->assertEquals('In Service', $shipStatus->getStatus());
    }

    public function testSetIdShipToNull()
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setIdShip(null);

        $this->assertNull($shipStatus->getIdShip());
    }

    public function testSetStatusToNull()
    {
        $shipStatus = new ShipStatus();
        $shipStatus->setStatus(null);

        $this->assertNull($shipStatus->getStatus());
    }
}
