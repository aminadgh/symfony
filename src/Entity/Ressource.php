<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $type = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $urlOuFichier = null;

    #[ORM\ManyToOne(targetEntity: Cours::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Cours $cours = null;

    #[ORM\ManyToOne(targetEntity: Module::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Module $module = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getUrlOuFichier(): ?string
    {
        return $this->urlOuFichier;
    }

    public function setUrlOuFichier(string $urlOuFichier): self
    {
        $this->urlOuFichier = $urlOuFichier;
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

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): self
    {
        $this->module = $module;
        return $this;
    }
}
