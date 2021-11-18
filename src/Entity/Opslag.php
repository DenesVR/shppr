<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OpslagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OpslagRepository::class)
 */
class Opslag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Opberger::class, inversedBy="opslags")
     * @ORM\JoinColumn(nullable=false)
     */
    private $opbergerId;

    /**
     * @ORM\ManyToOne(targetEntity=Producten::class, inversedBy="opslags")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productId;

    /**
     * @ORM\Column(type="integer")
     */
    private $aantal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $verpakking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpbergerId(): ?Opberger
    {
        return $this->opbergerId;
    }

    public function setOpbergerId(?Opberger $opbergerId): self
    {
        $this->opbergerId = $opbergerId;

        return $this;
    }

    public function getProductId(): ?Producten
    {
        return $this->productId;
    }

    public function setProductId(?Producten $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getVerpakking(): ?string
    {
        return $this->verpakking;
    }

    public function setVerpakking(string $verpakking): self
    {
        $this->verpakking = $verpakking;

        return $this;
    }
}
