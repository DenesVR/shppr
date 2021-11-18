<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProductenRepository::class)
 */
class Producten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="producten")
     */
    private $categorieId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $barcode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $inhoud;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $meeteenheid;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $vervaldatum;

    /**
     * @ORM\OneToMany(targetEntity=Opslag::class, mappedBy="productId")
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

    public function getCategorieId(): ?Categorie
    {
        return $this->categorieId;
    }

    public function setCategorieId(?Categorie $categorieId): self
    {
        $this->categorieId = $categorieId;

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

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getInhoud(): ?int
    {
        return $this->inhoud;
    }

    public function setInhoud(?int $inhoud): self
    {
        $this->inhoud = $inhoud;

        return $this;
    }

    public function getMeeteenheid(): ?string
    {
        return $this->meeteenheid;
    }

    public function setMeeteenheid(?string $meeteenheid): self
    {
        $this->meeteenheid = $meeteenheid;

        return $this;
    }

    public function getVervaldatum(): ?\DateTimeInterface
    {
        return $this->vervaldatum;
    }

    public function setVervaldatum(?\DateTimeInterface $vervaldatum): self
    {
        $this->vervaldatum = $vervaldatum;

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
            $opslag->setProductId($this);
        }

        return $this;
    }

    public function removeOpslag(Opslag $opslag): self
    {
        if ($this->opslags->removeElement($opslag)) {
            // set the owning side to null (unless already changed)
            if ($opslag->getProductId() === $this) {
                $opslag->setProductId(null);
            }
        }

        return $this;
    }
}
