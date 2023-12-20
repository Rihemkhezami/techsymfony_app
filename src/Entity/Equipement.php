<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(type: Types::BLOB)]
    private $image = null;

    #[ORM\ManyToOne(inversedBy: 'User_Equipement')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'equipements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Equipement_User = null;

    #[ORM\ManyToMany(targetEntity: Consommable::class, inversedBy: 'equipements')]
    private Collection $Equipement_Consommable;



    public function __construct()
    {
        $this->Equipement_Consommable = new ArrayCollection();
        $this->consommables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getEquipementUser(): ?User
    {
        return $this->Equipement_User;
    }

    public function setEquipementUser(?User $Equipement_User): static
    {
        $this->Equipement_User = $Equipement_User;

        return $this;
    }

    /**
     * @return Collection<int, Consommable>
     */
    public function getEquipementConsommable(): Collection
    {
        return $this->Equipement_Consommable;
    }

    public function addEquipementConsommable(Consommable $equipementConsommable): static
    {
        if (!$this->Equipement_Consommable->contains($equipementConsommable)) {
            $this->Equipement_Consommable->add($equipementConsommable);
        }

        return $this;
    }

    public function removeEquipementConsommable(Consommable $equipementConsommable): static
    {
        $this->Equipement_Consommable->removeElement($equipementConsommable);

        return $this;
    }

    /**
     * @return Collection<int, Consommable>
     */
    public function getConsommables(): Collection
    {
        return $this->consommables;
    }

    public function addConsommable(Consommable $consommable): static
    {
        if (!$this->consommables->contains($consommable)) {
            $this->consommables->add($consommable);
            $consommable->addConsommableEquipement($this);
        }

        return $this;
    }

    public function removeConsommable(Consommable $consommable): static
    {
        if ($this->consommables->removeElement($consommable)) {
            $consommable->removeConsommableEquipement($this);
        }

        return $this;
    }
}
