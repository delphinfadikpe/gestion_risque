<?php

namespace App\Entity;

use App\Repository\EventDatabaseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventDatabaseRepository::class)]
class EventDatabase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $idEvent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOuvDossier = null;

    #[ORM\Column(length: 255)]
    private ?string $natureIncident = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Agent $agent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDecouverte = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?Agent $Proprio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateStatutCas = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?Decisioncas $decisioncas = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateAffectation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFinTraitement = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?TypeReference $typeReference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?BaleNiveau1 $baleNiveau1 = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?BaleNiveau2 $baleNiveau2 = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?BaleNiveau3 $baleNiveau3 = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?Departement $departement = null;

    #[ORM\Column(nullable: true)]
    private ?bool $estPourCredit = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?TypologieIrregularite $typologieIrregularite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeClient = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDecais = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $montantPret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionCasPret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etatImpaye = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?EtatPretSystem $etatPretSystem = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionCasAutre = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?StatutPerte $statutPerte = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?ClassificationPerte $classificationPerte = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $montantBrut = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $montantNet = null;

    #[ORM\ManyToOne(inversedBy: 'eventDatabases')]
    private ?EvaluationtPerte $evaluationtPerte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEvent(): ?string
    {
        return $this->idEvent;
    }

    public function setIdEvent(string $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    public function getDateOuvDossier(): ?\DateTimeInterface
    {
        return $this->dateOuvDossier;
    }

    public function setDateOuvDossier(\DateTimeInterface $dateOuvDossier): self
    {
        $this->dateOuvDossier = $dateOuvDossier;

        return $this;
    }

    public function getNatureIncident(): ?string
    {
        return $this->natureIncident;
    }

    public function setNatureIncident(string $natureIncident): self
    {
        $this->natureIncident = $natureIncident;

        return $this;
    }

    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    public function setAgent(?Agent $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    public function getDateDecouverte(): ?\DateTimeInterface
    {
        return $this->dateDecouverte;
    }

    public function setDateDecouverte(\DateTimeInterface $dateDecouverte): self
    {
        $this->dateDecouverte = $dateDecouverte;

        return $this;
    }

    public function getProprio(): ?Agent
    {
        return $this->Proprio;
    }

    public function setProprio(?Agent $Proprio): self
    {
        $this->Proprio = $Proprio;

        return $this;
    }

    public function getDateStatutCas(): ?\DateTimeInterface
    {
        return $this->dateStatutCas;
    }

    public function setDateStatutCas(?\DateTimeInterface $dateStatutCas): self
    {
        $this->dateStatutCas = $dateStatutCas;

        return $this;
    }

    public function getDecisioncas(): ?Decisioncas
    {
        return $this->decisioncas;
    }

    public function setDecisioncas(?Decisioncas $decisioncas): self
    {
        $this->decisioncas = $decisioncas;

        return $this;
    }

    public function getDateAffectation(): ?\DateTimeInterface
    {
        return $this->dateAffectation;
    }

    public function setDateAffectation(?\DateTimeInterface $dateAffectation): self
    {
        $this->dateAffectation = $dateAffectation;

        return $this;
    }

    public function getDateFinTraitement(): ?\DateTimeInterface
    {
        return $this->dateFinTraitement;
    }

    public function setDateFinTraitement(?\DateTimeInterface $dateFinTraitement): self
    {
        $this->dateFinTraitement = $dateFinTraitement;

        return $this;
    }

    public function getTypeReference(): ?TypeReference
    {
        return $this->typeReference;
    }

    public function setTypeReference(?TypeReference $typeReference): self
    {
        $this->typeReference = $typeReference;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

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

    public function getBaleNiveau2(): ?BaleNiveau2
    {
        return $this->baleNiveau2;
    }

    public function setBaleNiveau2(?BaleNiveau2 $baleNiveau2): self
    {
        $this->baleNiveau2 = $baleNiveau2;

        return $this;
    }

    public function getBaleNiveau3(): ?BaleNiveau3
    {
        return $this->baleNiveau3;
    }

    public function setBaleNiveau3(?BaleNiveau3 $baleNiveau3): self
    {
        $this->baleNiveau3 = $baleNiveau3;

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

    public function isEstPourCredit(): ?bool
    {
        return $this->estPourCredit;
    }

    public function setEstPourCredit(?bool $estPourCredit): self
    {
        $this->estPourCredit = $estPourCredit;

        return $this;
    }

    public function getTypologieIrregularite(): ?TypologieIrregularite
    {
        return $this->typologieIrregularite;
    }

    public function setTypologieIrregularite(?TypologieIrregularite $typologieIrregularite): self
    {
        $this->typologieIrregularite = $typologieIrregularite;

        return $this;
    }

    public function getCodeClient(): ?string
    {
        return $this->codeClient;
    }

    public function setCodeClient(?string $codeClient): self
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    public function getDateDecais(): ?\DateTimeInterface
    {
        return $this->dateDecais;
    }

    public function setDateDecais(?\DateTimeInterface $dateDecais): self
    {
        $this->dateDecais = $dateDecais;

        return $this;
    }

    public function getMontantPret(): ?string
    {
        return $this->montantPret;
    }

    public function setMontantPret(?string $montantPret): self
    {
        $this->montantPret = $montantPret;

        return $this;
    }

    public function getDescriptionCasPret(): ?string
    {
        return $this->descriptionCasPret;
    }

    public function setDescriptionCasPret(?string $descriptionCasPret): self
    {
        $this->descriptionCasPret = $descriptionCasPret;

        return $this;
    }

    public function getEtatImpaye(): ?string
    {
        return $this->etatImpaye;
    }

    public function setEtatImpaye(?string $etatImpaye): self
    {
        $this->etatImpaye = $etatImpaye;

        return $this;
    }

    public function getEtatPretSystem(): ?EtatPretSystem
    {
        return $this->etatPretSystem;
    }

    public function setEtatPretSystem(?EtatPretSystem $etatPretSystem): self
    {
        $this->etatPretSystem = $etatPretSystem;

        return $this;
    }

    public function getDescriptionCasAutre(): ?string
    {
        return $this->descriptionCasAutre;
    }

    public function setDescriptionCasAutre(string $descriptionCasAutre): self
    {
        $this->descriptionCasAutre = $descriptionCasAutre;

        return $this;
    }

    public function getStatutPerte(): ?StatutPerte
    {
        return $this->statutPerte;
    }

    public function setStatutPerte(?StatutPerte $statutPerte): self
    {
        $this->statutPerte = $statutPerte;

        return $this;
    }

    public function getClassificationPerte(): ?ClassificationPerte
    {
        return $this->classificationPerte;
    }

    public function setClassificationPerte(?ClassificationPerte $classificationPerte): self
    {
        $this->classificationPerte = $classificationPerte;

        return $this;
    }

    public function getMontantBrut(): ?string
    {
        return $this->montantBrut;
    }

    public function setMontantBrut(?string $montantBrut): self
    {
        $this->montantBrut = $montantBrut;

        return $this;
    }

    public function getMontantNet(): ?string
    {
        return $this->montantNet;
    }

    public function setMontantNet(?string $montantNet): self
    {
        $this->montantNet = $montantNet;

        return $this;
    }

    public function getEvaluationtPerte(): ?EvaluationtPerte
    {
        return $this->evaluationtPerte;
    }

    public function setEvaluationtPerte(?EvaluationtPerte $evaluationtPerte): self
    {
        $this->evaluationtPerte = $evaluationtPerte;

        return $this;
    }
}
