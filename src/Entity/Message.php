<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "text")]
    private ?string $contenu = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateEnvoi = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $expéditeur = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, nullable: true)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Utilisateur $destinataireUtilisateur = null;

    #[ORM\ManyToOne(targetEntity: GrpCommunication::class, nullable: true)]
    #[ORM\JoinColumn(nullable: true)]
    private ?GrpCommunication $destinataireGroupe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;
        return $this;
    }

    public function getExpéditeur(): ?Utilisateur
    {
        return $this->expéditeur;
    }

    public function setExpéditeur(?Utilisateur $expéditeur): self
    {
        $this->expéditeur = $expéditeur;
        return $this;
    }

    public function getDestinataireUtilisateur(): ?Utilisateur
    {
        return $this->destinataireUtilisateur;
    }

    public function setDestinataireUtilisateur(?Utilisateur $destinataireUtilisateur): self
    {
        $this->destinataireUtilisateur = $destinataireUtilisateur;
        return $this;
    }

    public function getDestinataireGroupe(): ?GrpCommunication
    {
        return $this->destinataireGroupe;
    }

    public function setDestinataireGroupe(?GrpCommunication $destinataireGroupe): self
    {
        $this->destinataireGroupe = $destinataireGroupe;
        return $this;
    }
}
