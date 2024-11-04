<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $HeureDebut = null;
    /**
     * @var Collection<int, Reservations>
     */
    #[ORM\OneToMany(targetEntity: Reservations::class, mappedBy: 'seances')]
    private Collection $reservations;

    #[ORM\ManyToOne(inversedBy: 'seances')]
    private ?Films $films = null;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDebut(): ?\DateTimeImmutable
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(\DateTimeImmutable $HeureDebut): static
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }
    /**
     * @return Collection<int, Reservations>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): static
    {
        if (!$this->reservations->contains ($reservation)) {
            $this->reservations->add ($reservation);
            $reservation->setSeances ($this);
        }

        return $this;
    }

    public function removeReservation (Reservations $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getSeances() === $this) {
                $reservation->setSeances(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getHeureDebut()->format('H:i');
    }

    public function getFilms(): ?Films
    {
        return $this->films;
    }

    public function setFilms(?Films $films): static
    {
        $this->films = $films;

        return $this;
    }
}
