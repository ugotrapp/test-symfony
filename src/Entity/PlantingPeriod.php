<?php

namespace App\Entity;

use App\Repository\PlantingPeriodRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlantingPeriodRepository::class)
 */
class PlantingPeriod
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
     * @ORM\Column(type="integer")
     */
    private $rank;

    /**
     * @ORM\ManyToMany(targetEntity=Seed::class, mappedBy="plantingPeriod")
     */
    private $seeds;

    public function __construct()
    {
        $this->seeds = new ArrayCollection();
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

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * @return Collection|Seed[]
     */
    public function getSeeds(): Collection
    {
        return $this->seeds;
    }

    public function addSeed(Seed $seed): self
    {
        if (!$this->seeds->contains($seed)) {
            $this->seeds[] = $seed;
            $seed->addPlantingPeriod($this);
        }

        return $this;
    }

    public function removeSeed(Seed $seed): self
    {
        if ($this->seeds->removeElement($seed)) {
            $seed->removePlantingPeriod($this);
        }

        return $this;
    }
}
