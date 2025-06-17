<?php

namespace App\Entity;

use App\Repository\ResonatorRepository;
use App\Entity\Forte;
use App\Enum\Rarity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResonatorRepository::class)]
#[ORM\Table(name: '`resonator`')]
class Resonator
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $attribute = null;

    #[ORM\Column(length: 100)]
    private ?string $weaponType = null;

    #[ORM\Column(type: 'integer', enumType: Rarity::class)]
    private Rarity $rarity;

    #[ORM\Column(length: 50)]
    private ?string $affiliation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $releaseDate = null;

    /**
     * @var Collection<int, Forte>
     */
    #[ORM\OneToMany(targetEntity: Forte::class, mappedBy: 'resonator')]
    private Collection $forte;

    public function __construct()
    {
        $this->forte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAttribute(): ?string
    {
        return $this->attribute;
    }

    public function setAttribute(string $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getWeaponType(): ?string
    {
        return $this->weaponType;
    }

    public function setWeaponType(string $weaponType): static
    {
        $this->weaponType = $weaponType;

        return $this;
    }

    public function getRarity(): ?Rarity
    {
        return $this->rarity;
    }

    public function setRarity(Rarity $rarity): static
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getAffiliation(): ?string
    {
        return $this->affiliation;
    }

    public function setAffiliation(string $affiliation): static
    {
        $this->affiliation = $affiliation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTime $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return Collection<int, Forte>
     */
    public function getForte(): Collection
    {
        return $this->forte;
    }

    public function addForte(Forte $forte): static
    {
        if (!$this->forte->contains($forte)) {
            $this->forte->add($forte);
            $forte->setResonator($this);
        }

        return $this;
    }

    public function removeForte(Forte $forte): static
    {
        if ($this->forte->removeElement($forte)) {
            // set the owning side to null (unless already changed)
            if ($forte->getResonator() === $this) {
                $forte->setResonator(null);
            }
        }

        return $this;
    }
}
