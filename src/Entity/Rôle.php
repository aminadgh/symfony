<?php

namespace App\Entity;

use App\Repository\RôleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Rôle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $idRole;

    #[ORM\Column(type: 'string', length: 50)]
    private string $nomRole;

    // Getters and setters
    public function getIdRole(): int
    {
        return $this->idRole;
    }

    public function getNomRole(): string
    {
        return $this->nomRole;
    }

    public function setNomRole(string $nomRole): self
    {
        $this->nomRole = $nomRole;
        return $this;
    }

    // Methods
    public function attribuerRole(): void
    {
        // Logic for assigning a role
        // Implement role assignment logic as needed
    }

}
