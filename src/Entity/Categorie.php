<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $categorieNaam;

    /**
     * @ORM\OneToMany(targetEntity=Producten::class, mappedBy="categorieId")
     */
    private $producten;

    public function __construct()
    {
        $this->producten = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorieNaam(): ?string
    {
        return $this->categorieNaam;
    }

    public function setCategorieNaam(string $categorieNaam): self
    {
        $this->categorieNaam = $categorieNaam;

        return $this;
    }

    /**
     * @return Collection|Producten[]
     */
    public function getProducten(): Collection
    {
        return $this->producten;
    }

    public function addProducten(Producten $producten): self
    {
        if (!$this->producten->contains($producten)) {
            $this->producten[] = $producten;
            $producten->setCategorieId($this);
        }

        return $this;
    }

    public function removeProducten(Producten $producten): self
    {
        if ($this->producten->removeElement($producten)) {
            // set the owning side to null (unless already changed)
            if ($producten->getCategorieId() === $this) {
                $producten->setCategorieId(null);
            }
        }

        return $this;
    }
}
