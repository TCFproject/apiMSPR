<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Botaniste $botaniste = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Proprietaire $proprietaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBotaniste(): ?Botaniste
    {
        return $this->botaniste;
    }

    public function setBotaniste(?Botaniste $botaniste): self
    {
        // unset the owning side of the relation if necessary
        if ($botaniste === null && $this->botaniste !== null) {
            $this->botaniste->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($botaniste !== null && $botaniste->getUser() !== $this) {
            $botaniste->setUser($this);
        }

        $this->botaniste = $botaniste;

        return $this;
    }
    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        // unset the owning side of the relation if necessary
        if ($proprietaire === null && $this->proprietaire !== null) {
            $this->proprietaire->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($proprietaire !== null && $proprietaire->getUser() !== $this) {
            $proprietaire->setUser($this);
        }

        $this->proprietaire = $proprietaire;

        return $this;
    }
}
