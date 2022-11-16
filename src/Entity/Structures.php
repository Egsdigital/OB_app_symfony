<?php

namespace App\Entity;

use App\Repository\StructuresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructuresRepository::class)]
class Structures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'structures')]
    private ?user $user_id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_structure = null;

    #[ORM\ManyToOne(inversedBy: 'structureEmail')]
    private ?user $user_email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAdresseStructure(): ?string
    {
        return $this->adresse_structure;
    }

    public function setAdresseStructure(string $adresse_structure): self
    {
        $this->adresse_structure = $adresse_structure;

        return $this;
    }

    public function getUserEmail(): ?user
    {
        return $this->user_email;
    }

    public function setUserEmail(?user $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }
}
