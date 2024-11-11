<?php

namespace App\Entity;

use App\Repository\DevoirRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity(repositoryClass: DevoirRepository::class)]
class Devoir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $titreDevoir = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateLimite = null;

    #[ORM\ManyToOne(targetEntity: Cours::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cours $cours = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreDevoir(): ?string
    {
        return $this->titreDevoir;
    }

    public function setTitreDevoir(string $titreDevoir): self
    {
        $this->titreDevoir = $titreDevoir;
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

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->dateLimite;
    }

    public function setDateLimite(\DateTimeInterface $dateLimite): self
    {
        $this->dateLimite = $dateLimite;
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
}
