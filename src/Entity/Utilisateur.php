<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $idUtilisateur;

    #[ORM\Column(type: 'string', length: 50)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 50)]
    private string $prenom;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string')]
    private string $motDePasse;

    #[ORM\Column(type: 'date')]
    private \DateTime $dateInscription;

    // Getters and setters
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getDateInscription(): \DateTime
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTime $dateInscription): self
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }

    // Methods
    public function authentifier(): bool
    {
        // Logic for authenticating the user
        return true;
    }

    public function mettreAJourProfil(): void
    {
        // Logic for updating the user profile
    }

    public function changerMotDePasse(string $nouveauMotDePasse): void
    {
        $this->motDePasse = $nouveauMotDePasse;
        // Additional logic for password change
    }
}
