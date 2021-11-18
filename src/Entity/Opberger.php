<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OpbergerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OpbergerRepository::class)
 */
class Opberger
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="opbergers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\OneToMany(targetEntity=Opslag::class, mappedBy="opbergerId")
     */
    private $opslags;

    public function __construct()
    {
        $this->opslags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * @return Collection|Opslag[]
     */
    public function getOpslags(): Collection
    {
        return $this->opslags;
    }

    public function addOpslag(Opslag $opslag): self
    {
        if (!$this->opslags->contains($opslag)) {
            $this->opslags[] = $opslag;
            $opslag->setOpbergerId($this);
        }

        return $this;
    }

    public function removeOpslag(Opslag $opslag): self
    {
        if ($this->opslags->removeElement($opslag)) {
            // set the owning side to null (unless already changed)
            if ($opslag->getOpbergerId() === $this) {
                $opslag->setOpbergerId(null);
            }
        }

        return $this;
    }
}
