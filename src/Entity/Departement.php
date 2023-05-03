<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartementRepository::class)]
class Departement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleDepartement = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Agence $agence = null;

    #[ORM\OneToMany(mappedBy: 'departement', targetEntity: Agent::class)]
    private Collection $agents;

    #[ORM\OneToMany(mappedBy: 'departement', targetEntity: EventDatabase::class)]
    private Collection $eventDatabases;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
        $this->eventDatabases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleDepartement(): ?string
    {
        return $this->libelleDepartement;
    }

    public function setLibelleDepartement(string $libelleDepartement): self
    {
        $this->libelleDepartement = $libelleDepartement;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * @return Collection<int, Agent>
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agents->contains($agent)) {
            $this->agents->add($agent);
            $agent->setDepartement($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getDepartement() === $this) {
                $agent->setDepartement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EventDatabase>
     */
    public function getEventDatabases(): Collection
    {
        return $this->eventDatabases;
    }

    public function addEventDatabase(EventDatabase $eventDatabase): self
    {
        if (!$this->eventDatabases->contains($eventDatabase)) {
            $this->eventDatabases->add($eventDatabase);
            $eventDatabase->setDepartement($this);
        }

        return $this;
    }

    public function removeEventDatabase(EventDatabase $eventDatabase): self
    {
        if ($this->eventDatabases->removeElement($eventDatabase)) {
            // set the owning side to null (unless already changed)
            if ($eventDatabase->getDepartement() === $this) {
                $eventDatabase->setDepartement(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->libelleDepartement;
    }
   
}
