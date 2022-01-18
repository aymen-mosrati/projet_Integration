<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // /**
    //  * @ORM\Column(type="string", length=255, nullable=true)
    //  */
    // private $Photo;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Date_img;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description_img;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Mnt_img;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="image")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="image")
     */
    private $commentaire;

    public function __construct()
    {
        $this->commentaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getPhoto(): ?string
    // {
    //     return $this->Photo;
    // }

    // public function setPhoto(?string $Photo): self
    // {
    //     $this->Photo = $Photo;

    //     return $this;
    // }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     * @return $this
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    } 

     /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        // VERY IMPORTANT:
        // It is required that at lst one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($imageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->createdAt = new \DateTimeImmutable('now');
        }
    }

    public function getDateImg(): ?\DateTimeInterface
    {
        return $this->Date_img;
    }

    public function setDateImg(?\DateTimeInterface $Date_img): self
    {
        $this->Date_img = $Date_img;

        return $this;
    }

    public function getDescriptionImg(): ?string
    {
        return $this->Description_img;
    }

    public function setDescriptionImg(?string $Description_img): self
    {
        $this->Description_img = $Description_img;

        return $this;
    }

    public function getMntImg(): ?int
    {
        return $this->Mnt_img;
    }

    public function setMntImg(?int $Mnt_img): self
    {
        $this->Mnt_img = $Mnt_img;

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

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setImage($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getImage() === $this) {
                $commentaire->setImage(null);
            }
        }

        return $this;
    }
}
