<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orde;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrde(): ?string
    {
        return $this->orde;
    }

    public function setOrde(string $orde): self
    {
        $this->orde = $orde;

        return $this;
    }
}
