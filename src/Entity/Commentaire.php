<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $Description_cmt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Date_cmt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commentaire")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Image::class, inversedBy="commentaire")
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionCmt(): ?string
    {
        return $this->Description_cmt;
    }

    public function setDescriptionCmt(?string $Description_cmt): self
    {
        $this->Description_cmt = $Description_cmt;

        return $this;
    }

    public function getDateCmt(): ?\DateTimeInterface
    {
        return $this->Date_cmt;
    }

    public function setDateCmt(?\DateTimeInterface $Date_cmt): self
    {
        $this->Date_cmt = $Date_cmt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function __toString()
    {
        return $this->Description_cmt;
    }
}
