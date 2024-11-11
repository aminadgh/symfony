<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: "text")]
    private ?string $contenu = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $datePublication = null;

    #[ORM\ManyToOne(targetEntity: Cours::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Cours $cours = null;

    #[ORM\ManyToOne(targetEntity: Événement::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Événement $evenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
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

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;
        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;
        return $this;
    }

    public function getEvenement(): ?Événement
    {
        return $this->evenement;
    }

    public function setEvenement(?Événement $evenement): self
    {
        $this->evenement = $evenement;
        return $this;
    }
}
