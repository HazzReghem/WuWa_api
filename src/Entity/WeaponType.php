<?php

namespace App\Entity;

use App\Repository\WeaponTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponTypeRepository::class)]
class WeaponType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $name = null;

    /**
     * @var Collection<int, Weapon>
     */
    #[ORM\OneToMany(targetEntity: Weapon::class, mappedBy: 'weaponType')]
    private Collection $typeName;

    public function __construct()
    {
        $this->typeName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Weapon>
     */
    public function getTypeName(): Collection
    {
        return $this->typeName;
    }

    public function addTypeName(Weapon $typeName): static
    {
        if (!$this->typeName->contains($typeName)) {
            $this->typeName->add($typeName);
            $typeName->setWeaponType($this);
        }

        return $this;
    }

    public function removeTypeName(Weapon $typeName): static
    {
        if ($this->typeName->removeElement($typeName)) {
            // set the owning side to null (unless already changed)
            if ($typeName->getWeaponType() === $this) {
                $typeName->setWeaponType(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
