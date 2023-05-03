<?php

namespace App\Entity;

use App\Repository\BaleNiveau1Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BaleNiveau1Repository::class)]
class BaleNiveau1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'baleNiveau1', targetEntity: BaleNiveau2::class)]
    private Collection $baleNiveau2s;

    #[ORM\OneToMany(mappedBy: 'baleNiveau1', targetEntity: EventDatabase::class)]
    private Collection $eventDatabases;

    public function __construct()
    {
        $this->baleNiveau2s = new ArrayCollection();
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

    /**
     * @return Collection<int, BaleNiveau2>
     */
    public function getBaleNiveau2s(): Collection
    {
        return $this->baleNiveau2s;
    }

    public function addBaleNiveau2(BaleNiveau2 $baleNiveau2): self
    {
        if (!$this->baleNiveau2s->contains($baleNiveau2)) {
            $this->baleNiveau2s->add($baleNiveau2);
            $baleNiveau2->setBaleNiveau1($this);
        }

        return $this;
    }

    public function removeBaleNiveau2(BaleNiveau2 $baleNiveau2): self
    {
        if ($this->baleNiveau2s->removeElement($baleNiveau2)) {
            // set the owning side to null (unless already changed)
            if ($baleNiveau2->getBaleNiveau1() === $this) {
                $baleNiveau2->setBaleNiveau1(null);
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
            $eventDatabase->setBaleNiveau1($this);
        }

        return $this;
    }

    public function removeEventDatabase(EventDatabase $eventDatabase): self
    {
        if ($this->eventDatabases->removeElement($eventDatabase)) {
            // set the owning side to null (unless already changed)
            if ($eventDatabase->getBaleNiveau1() === $this) {
                $eventDatabase->setBaleNiveau1(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->libelle;
    }
}
