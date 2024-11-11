<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nomCours = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: "string", length: 50, unique: true)]
    private ?string $codeCours = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $enseignantResponsable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCours(): ?string
    {
        return $this->nomCours;
    }

    public function setNomCours(string $nomCours): self
    {
        $this->nomCours = $nomCours;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCodeCours(): ?string
    {
        return $this->codeCours;
    }

    public function setCodeCours(string $codeCours): self
    {
        $this->codeCours = $codeCours;
        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getEnseignantResponsable(): ?Utilisateur
    {
        return $this->enseignantResponsable;
    }

    public function setEnseignantResponsable(?Utilisateur $enseignantResponsable): self
    {
        $this->enseignantResponsable = $enseignantResponsable;
        return $this;
    }
}
