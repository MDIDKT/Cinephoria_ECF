<?php

namespace App\Entity;

use App\Repository\IncidentsRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncidentsRepository::class)]
class Incidents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Salles $salle = null;

    #[ORM\ManyToOne(inversedBy: 'incident')]
    private ?Employes $employes = null;

    public function getId (): ?int
    {
        return $this->id;
    }

    public function getDescription (): ?string
    {
        return $this->description;
    }

    public function setDescription (?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDate (): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate (DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSalle (): ?Salles
    {
        return $this->salle;
    }

    public function setSalle (?Salles $salle): static
    {
        $this->salle = $salle;

        return $this;
    }

    public function getEmployes (): ?Employes
    {
        return $this->employes;
    }

    public function setEmployes (?Employes $employes): static
    {
        $this->employes = $employes;

        return $this;
    }
}
