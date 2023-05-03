<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgenceRepository::class)]
class Agence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codeAgence = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeAgence(): ?string
    {
        return $this->codeAgence;
    }

    public function setCodeAgence(string $codeAgence): self
    {
        $this->codeAgence = $codeAgence;

        return $this;
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

    public function __toString()
    {
        return $this->codeAgence.'-'.$this->libelle;
    }
}
