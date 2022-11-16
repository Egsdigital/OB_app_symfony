<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\ManyToOne(inversedBy: 'user_id')]
    private ?Apiclients $apiclients = null;

    #[ORM\ManyToOne(inversedBy: 'user_id')]
    private ?Partenaires $partenaires = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Structures::class)]
    private Collection $structures;

    #[ORM\OneToMany(mappedBy: 'user_email', targetEntity: Structures::class)]
    private Collection $structureEmail;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    public function __construct()
    {
        $this->structures = new ArrayCollection();
        $this->structureEmail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getApiclients(): ?Apiclients
    {
        return $this->apiclients;
    }

    public function setApiclients(?Apiclients $apiclients): self
    {
        $this->apiclients = $apiclients;

        return $this;
    }

    public function getPartenaires(): ?Partenaires
    {
        return $this->partenaires;
    }

    public function setPartenaires(?Partenaires $partenaires): self
    {
        $this->partenaires = $partenaires;

        return $this;
    }

    /**
     * @return Collection<int, Structures>
     */
    public function getStructures(): Collection
    {
        return $this->structures;
    }

    public function addStructure(Structures $structure): self
    {
        if (!$this->structures->contains($structure)) {
            $this->structures->add($structure);
            $structure->setUserId($this);
        }

        return $this;
    }

    public function removeStructure(Structures $structure): self
    {
        if ($this->structures->removeElement($structure)) {
            // set the owning side to null (unless already changed)
            if ($structure->getUserId() === $this) {
                $structure->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Structures>
     */
    public function getStructureEmail(): Collection
    {
        return $this->structureEmail;
    }

    public function addStructureEmail(Structures $structureEmail): self
    {
        if (!$this->structureEmail->contains($structureEmail)) {
            $this->structureEmail->add($structureEmail);
            $structureEmail->setUserEmail($this);
        }

        return $this;
    }

    public function removeStructureEmail(Structures $structureEmail): self
    {
        if ($this->structureEmail->removeElement($structureEmail)) {
            // set the owning side to null (unless already changed)
            if ($structureEmail->getUserEmail() === $this) {
                $structureEmail->setUserEmail(null);
            }
        }

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
}
