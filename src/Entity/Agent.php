<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgentRepository::class)]
class Agent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule = null;

    #[ORM\Column]
    private ?bool $estAgentRisque = null;

    #[ORM\Column]
    private ?bool $estResponsable = null;

    #[ORM\ManyToOne(inversedBy: 'agents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Departement $departement = null;

    #[ORM\OneToMany(mappedBy: 'agent', targetEntity: EventDatabase::class)]
    private Collection $eventDatabases;

    public function __construct()
    {
        $this->eventDatabases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function isEstAgentRisque(): ?bool
    {
        return $this->estAgentRisque;
    }

    public function setEstAgentRisque(bool $estAgentRisque): self
    {
        $this->estAgentRisque = $estAgentRisque;

        return $this;
    }

    public function isEstResponsable(): ?bool
    {
        return $this->estResponsable;
    }

    public function setEstResponsable(bool $estResponsable): self
    {
        $this->estResponsable = $estResponsable;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

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
            $eventDatabase->setAgent($this);
        }

        return $this;
    }

    public function removeEventDatabase(EventDatabase $eventDatabase): self
    {
        if ($this->eventDatabases->removeElement($eventDatabase)) {
            // set the owning side to null (unless already changed)
            if ($eventDatabase->getAgent() === $this) {
                $eventDatabase->setAgent(null);
            }
        }

        return $this;
    }
}
