<?php

namespace App\Entity;

use App\Repository\ShipsRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Model\StarshipStatusEnum;

#[ORM\Entity(repositoryClass: ShipsRepository::class)]
class Ships
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $class = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $captain = null;

    #[ORM\ManyToOne(targetEntity: ShipStatus::class)]
    private ShipStatus $status;

    #[ORM\ManyToOne]
    private ?ships $status_id = null;

    #[ORM\Column]
    private ?int $status_id_id = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): static
    {
        $this->class = $class;

        return $this;
    }

    public function getCaptain(): ?string
    {
        return $this->captain;
    }

    public function setCaptain(?string $captain): static
    {
        $this->captain = $captain;

        return $this;
    }  
    public function getStatus(): ?ShipStatus
    {
        return $this->status;
    }
    public function setStatus(?ShipStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatusId(): ?ships
    {
        return $this->status_id;
    }

    public function setStatusId(?ships $status_id): static
    {
        $this->status_id = $status_id;

        return $this;
    }

    public function getStatusIdId(): ?int
    {
        return $this->status_id_id;
    }

    public function setStatusIdId(int $status_id_id): static
    {
        $this->status_id_id = $status_id_id;

        return $this;
    }

}
