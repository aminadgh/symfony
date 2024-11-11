<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(type: "string", length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $motDePasse = null;

    #[ORM\ManyToOne(targetEntity: Rôle::class)]
    #[ORM\JoinColumn(name: "role_id", referencedColumnName: "id")]
    private ?Rôle $role = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(type: "string", length: 20)]
    private ?string $statut = 'actif'; // Par défaut, l'utilisateur est actif

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getRole(): ?Rôle
    {
        return $this->role;
    }

    public function setRole(?Rôle $role): self
    {
        $this->role = $role;
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
