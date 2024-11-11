<?php

namespace App\Entity;

use App\Repository\InscriEvenementRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity(repositoryClass: InscriEvenementRepository::class)]
class InscriEvenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Événement::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Événement $événement = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getÉvénement(): ?Événement
    {
        return $this->événement;
    }

    public function setÉvénement(?Événement $événement): self
    {
        $this->événement = $événement;
        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }
}
