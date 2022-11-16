<?php

namespace App\Entity;

use App\Repository\PartenairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenairesRepository::class)]
class Partenaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'partenaires', targetEntity: user::class)]
    private Collection $user_id;

    #[ORM\Column(length: 255)]
    private ?string $partenaire_name = null;

    #[ORM\Column]
    private ?bool $_active = null;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, user>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(user $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
            $userId->setPartenaires($this);
        }

        return $this;
    }

    public function removeUserId(user $userId): self
    {
        if ($this->user_id->removeElement($userId)) {
            // set the owning side to null (unless already changed)
            if ($userId->getPartenaires() === $this) {
                $userId->setPartenaires(null);
            }
        }

        return $this;
    }

    public function getPartenaireName(): ?string
    {
        return $this->partenaire_name;
    }

    public function setPartenaireName(string $partenaire_name): self
    {
        $this->partenaire_name = $partenaire_name;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->_active;
    }

    public function setActive(bool $_active): self
    {
        $this->_active = $_active;

        return $this;
    }
}
