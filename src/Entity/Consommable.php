<?php

namespace App\Entity;

use App\Repository\ConsommableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsommableRepository::class)]
class Consommable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column(type: Types::BLOB)]
    private $image = null;




    #[ORM\OneToMany(mappedBy: 'LigneCommande_Consommable', targetEntity: LigneCommande::class)]
    private Collection $ligneCommandes;

    #[ORM\ManyToMany(targetEntity: Equipement::class, mappedBy: 'Equipement_Consommable')]
    private Collection $equipements;



    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->Consommable_Commande = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
        $this->equipements = new ArrayCollection();
        $this->Consommable_Equipement = new ArrayCollection();
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

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

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

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->addCommandeConsommable($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeCommandeConsommable($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getConsommableCommande(): Collection
    {
        return $this->Consommable_Commande;
    }

    public function addConsommableCommande(Commande $consommableCommande): static
    {
        if (!$this->Consommable_Commande->contains($consommableCommande)) {
            $this->Consommable_Commande->add($consommableCommande);
        }

        return $this;
    }

    public function removeConsommableCommande(Commande $consommableCommande): static
    {
        $this->Consommable_Commande->removeElement($consommableCommande);

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): static
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->add($ligneCommande);
            $ligneCommande->setLigneCommandeConsommable($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getLigneCommandeConsommable() === $this) {
                $ligneCommande->setLigneCommandeConsommable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): static
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements->add($equipement);
            $equipement->addEquipementConsommable($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): static
    {
        if ($this->equipements->removeElement($equipement)) {
            $equipement->removeEquipementConsommable($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getConsommableEquipement(): Collection
    {
        return $this->Consommable_Equipement;
    }

    public function addConsommableEquipement(Equipement $consommableEquipement): static
    {
        if (!$this->Consommable_Equipement->contains($consommableEquipement)) {
            $this->Consommable_Equipement->add($consommableEquipement);
        }

        return $this;
    }

    public function removeConsommableEquipement(Equipement $consommableEquipement): static
    {
        $this->Consommable_Equipement->removeElement($consommableEquipement);

        return $this;
    }

    public function __toString(): string
    {
        return $this->label;
    }

}
