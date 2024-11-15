<?php
namespace App\Entity;

use App\Repository\ShipsRepository;
use Doctrine\ORM\Mapping as ORM;

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

    #[ORM\Column(length: 255, nullable: true)] // Dodajemy to pole
    private ?string $image_url = null; // Właściwość dla URL obrazu

    #[ORM\ManyToOne(targetEntity: ShipStatus::class)]
    private ?ShipStatus $status = null;

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

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(?string $image_url): self
    {
        $this->image_url = $image_url;
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

    // Metoda do uzyskiwania ID statusu
    public function getStatusId(): ?int
    {
        return $this->status ? $this->status->getId() : null; // Zwraca ID statusu lub null
    }
}
