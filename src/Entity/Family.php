<?php

namespace App\Entity;

use App\Repository\FamilyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilyRepository::class)
 */
class Family
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
     * @ORM\OneToMany(targetEntity=Seed::class, mappedBy="family")
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
            $seed->setFamily($this);
        }

        return $this;
    }

    public function removeSeed(Seed $seed): self
    {
        if ($this->seeds->removeElement($seed)) {
            // set the owning side to null (unless already changed)
            if ($seed->getFamily() === $this) {
                $seed->setFamily(null);
            }
        }

        return $this;
    }
}
