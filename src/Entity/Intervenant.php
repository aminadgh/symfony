<?php

namespace App\Entity;

use App\Repository\IntervenantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntervenantRepository::class)]
class Intervenant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $nomIntervenant = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $bio = null;

    #[ORM\ManyToOne(targetEntity: Événement::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Événement $événement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomIntervenant(): ?string
    {
        return $this->nomIntervenant;
    }

    public function setNomIntervenant(string $nomIntervenant): self
    {
        $this->nomIntervenant = $nomIntervenant;
        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;
        return $this;
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
}
