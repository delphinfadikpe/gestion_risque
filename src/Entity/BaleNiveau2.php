<?php

namespace App\Entity;

use App\Repository\BaleNiveau2Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BaleNiveau2Repository::class)]
class BaleNiveau2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'baleNiveau2s')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BaleNiveau1 $baleNiveau1 = null;

    #[ORM\OneToMany(mappedBy: 'baleNiveau2', targetEntity: BaleNiveau3::class)]
    private Collection $baleNiveau3s;

    #[ORM\OneToMany(mappedBy: 'baleNiveau2', targetEntity: EventDatabase::class)]
    private Collection $eventDatabases;

    public function __construct()
    {
        $this->baleNiveau3s = new ArrayCollection();
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

    public function getBaleNiveau1(): ?BaleNiveau1
    {
        return $this->baleNiveau1;
    }

    public function setBaleNiveau1(?BaleNiveau1 $baleNiveau1): self
    {
        $this->baleNiveau1 = $baleNiveau1;

        return $this;
    }

    /**
     * @return Collection<int, BaleNiveau3>
     */
    public function getBaleNiveau3s(): Collection
    {
        return $this->baleNiveau3s;
    }

    public function addBaleNiveau3(BaleNiveau3 $baleNiveau3): self
    {
        if (!$this->baleNiveau3s->contains($baleNiveau3)) {
            $this->baleNiveau3s->add($baleNiveau3);
            $baleNiveau3->setBaleNiveau2($this);
        }

        return $this;
    }

    public function removeBaleNiveau3(BaleNiveau3 $baleNiveau3): self
    {
        if ($this->baleNiveau3s->removeElement($baleNiveau3)) {
            // set the owning side to null (unless already changed)
            if ($baleNiveau3->getBaleNiveau2() === $this) {
                $baleNiveau3->setBaleNiveau2(null);
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
            $eventDatabase->setBaleNiveau2($this);
        }

        return $this;
    }

    public function removeEventDatabase(EventDatabase $eventDatabase): self
    {
        if ($this->eventDatabases->removeElement($eventDatabase)) {
            // set the owning side to null (unless already changed)
            if ($eventDatabase->getBaleNiveau2() === $this) {
                $eventDatabase->setBaleNiveau2(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->libelle;
    }
}
