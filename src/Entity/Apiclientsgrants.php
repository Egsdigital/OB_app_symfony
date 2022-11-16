<?php

namespace App\Entity;

use App\Repository\ApiclientsgrantsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiclientsgrantsRepository::class)]
class Apiclientsgrants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'apiclientsgrants', cascade: ['persist', 'remove'])]
    private ?ApiClients $client_grant = null;

    #[ORM\Column(nullable: true)]
    private ?int $client_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $install_id = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(length: 255)]
    private ?string $perms = null;

    #[ORM\Column]
    private ?bool $branch_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientGrant(): ?ApiClients
    {
        return $this->client_grant;
    }

    public function setClientGrant(?ApiClients $client_grant): self
    {
        $this->client_grant = $client_grant;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(?int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getInstallId(): ?int
    {
        return $this->install_id;
    }

    public function setInstallId(?int $install_id): self
    {
        $this->install_id = $install_id;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getPerms(): ?string
    {
        return $this->perms;
    }

    public function setPerms(string $perms): self
    {
        $this->perms = $perms;

        return $this;
    }

    public function isBranchId(): ?bool
    {
        return $this->branch_id;
    }

    public function setBranchId(bool $branch_id): self
    {
        $this->branch_id = $branch_id;

        return $this;
    }
}
