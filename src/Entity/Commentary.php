<?php

namespace App\Entity;

use App\Repository\CommentaryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaryRepository::class)]
class Commentary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'commentaries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Botaniste $botanist = null;

    #[ORM\ManyToOne(inversedBy: 'commentaries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Plante $plant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getBotanist(): ?Botaniste
    {
        return $this->botanist;
    }

    public function setBotanist(?Botaniste $botanist): self
    {
        $this->botanist = $botanist;

        return $this;
    }

    public function getPlant(): ?Plante
    {
        return $this->plant;
    }

    public function setPlant(?Plante $plant): self
    {
        $this->plant = $plant;

        return $this;
    }
}
