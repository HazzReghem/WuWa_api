<?php

namespace App\Entity;

use App\Repository\WeaponRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponRepository::class)]
class Weapon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?int $baseAtk = null;

    #[ORM\ManyToOne(inversedBy: 'weapons')]
    private ?Stat $bonusStat = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $baseWeaponSkill = null;

    #[ORM\Column(length: 20)]
    private ?string $rarity = null;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

    public function getBaseAtk(): ?int
    {
        return $this->baseAtk;
    }

    public function setBaseAtk(?int $baseAtk): static
    {
        $this->baseAtk = $baseAtk;

        return $this;
    }

    public function getBonusStat(): ?Stat
    {
        return $this->bonusStat;
    }

    public function setBonusStat(?Stat $bonusStat): static
    {
        $this->bonusStat = $bonusStat;

        return $this;
    }

    public function getBaseWeaponSkill(): ?string
    {
        return $this->baseWeaponSkill;
    }

    public function setBaseWeaponSkill(string $baseWeaponSkill): static
    {
        $this->baseWeaponSkill = $baseWeaponSkill;

        return $this;
    }

    public function getRarity(): ?string
    {
        return $this->rarity;
    }

    public function setRarity(string $rarity): static
    {
        $this->rarity = $rarity;

        return $this;
    }
}
