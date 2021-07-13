<?php

namespace App\Entity;

use App\Repository\SeedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeedRepository::class)
 */
class Seed
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
    private $name;

    

   

    /**
     * @ORM\Column(type="text")
     */
    private $advice;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToMany(targetEntity=PlantingPeriod::class, inversedBy="seeds")
     */
    private $plantingPeriod;

    /**
     * @ORM\ManyToMany(targetEntity=HarvestPeriod::class, inversedBy="seeds")
     */
    private $harvestPeriod;

    /**
     * @ORM\ManyToOne(targetEntity=Family::class, inversedBy="seeds")
     */
    private $family;

    public function __construct()
    {
        $this->plantingPeriod = new ArrayCollection();
        $this->harvestPeriod = new ArrayCollection();
    }

    

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

    

    public function getAdvice(): ?string
    {
        return $this->advice;
    }

    public function setAdvice(string $advice): self
    {
        $this->advice = $advice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection|PlantingPeriod[]
     */
    public function getPlantingPeriod(): Collection
    {
        return $this->plantingPeriod;
    }

    public function addPlantingPeriod(PlantingPeriod $plantingPeriod): self
    {
        if (!$this->plantingPeriod->contains($plantingPeriod)) {
            $this->plantingPeriod[] = $plantingPeriod;
        }

        return $this;
    }

    public function removePlantingPeriod(PlantingPeriod $plantingPeriod): self
    {
        $this->plantingPeriod->removeElement($plantingPeriod);

        return $this;
    }

    /**
     * @return Collection|HarvestPeriod[]
     */
    public function getHarvestPeriod(): Collection
    {
        return $this->harvestPeriod;
    }

    public function addHarvestPeriod(HarvestPeriod $harvestPeriod): self
    {
        if (!$this->harvestPeriod->contains($harvestPeriod)) {
            $this->harvestPeriod[] = $harvestPeriod;
        }

        return $this;
    }

    public function removeHarvestPeriod(HarvestPeriod $harvestPeriod): self
    {
        $this->harvestPeriod->removeElement($harvestPeriod);

        return $this;
    }

    public function getFamily(): ?Family
    {
        return $this->family;
    }

    public function setFamily(?Family $family): self
    {
        $this->family = $family;

        return $this;
    }

    
}
