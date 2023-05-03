<?php

namespace App\Entity;

use App\Repository\BaleNiveau3Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BaleNiveau3Repository::class)]
class BaleNiveau3
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'baleNiveau3s')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BaleNiveau2 $baleNiveau2 = null;

    #[ORM\Column(length: 255)]
    private ?string $TypologieIrregularite = null;

    #[ORM\OneToMany(mappedBy: 'baleNiveau3', targetEntity: EventDatabase::class)]
    private Collection $eventDatabases;

    public function __construct()
    {
        $this->eventDatabases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getBaleNiveau2(): ?BaleNiveau2
    {
        return $this->baleNiveau2;
    }

    public function setBaleNiveau2(?BaleNiveau2 $baleNiveau2): self
    {
        $this->baleNiveau2 = $baleNiveau2;

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
            $eventDatabase->setBaleNiveau3($this);
        }

        return $this;
    }

    public function removeEventDatabase(EventDatabase $eventDatabase): self
    {
        if ($this->eventDatabases->removeElement($eventDatabase)) {
            // set the owning side to null (unless already changed)
            if ($eventDatabase->getBaleNiveau3() === $this) {
                $eventDatabase->setBaleNiveau3(null);
            }
        }

        return $this;
    }
}
