<?php

namespace App\Tests\Entity;

use App\Entity\Ships;
use App\Entity\ShipStatus;
use PHPUnit\Framework\TestCase;

class ShipsTest extends TestCase
{
    private Ships $ship;

    protected function setUp(): void
    {
        $this->ship = new Ships();
    }

    public function testSetAndGetName(): void
    {
        $name = "USS Enterprise";
        $this->ship->setName($name);
        $this->assertSame($name, $this->ship->getName());
    }

    public function testSetAndGetClass(): void
    {
        $class = "Cruiser";
        $this->ship->setClass($class);
        $this->assertSame($class, $this->ship->getClass());
    }

    public function testSetAndGetCaptain(): void
    {
        $captain = "James T. Kirk";
        $this->ship->setCaptain($captain);
        $this->assertSame($captain, $this->ship->getCaptain());
    }

    public function testSetAndGetStatus(): void
    {
        $status = new ShipStatus(); // Assuming ShipStatus is a valid entity.
        $this->ship->setStatus($status);
        $this->assertSame($status, $this->ship->getStatus());
    }

    public function testSetAndGetStatusId(): void
    {
        $ship = new Ships();
        $ship->setStatusId(456);
    
        $this->assertEquals(456, $ship->getStatusId());
    }

    public function testSetAndGetStatusIdId(): void
    {
        $statusIdId = 1;
        $this->ship->setStatusIdId($statusIdId);
        $this->assertSame($statusIdId, $this->ship->getStatusIdId());
    }
}
