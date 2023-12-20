<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'User_Commande')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Commande_User = null;




    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: LigneCommande::class)]
    private Collection $Commande_LigneCommande;

    #[ORM\OneToMany(mappedBy: 'LigneCommande_Commande', targetEntity: LigneCommande::class)]
    private Collection $ligneCommandes;

    public function __construct()
    {
        $this->Commande_Consommable = new ArrayCollection();
        $this->consommables = new ArrayCollection();
        $this->Commande_LigneCommande = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

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

    public function getCommandeUser(): ?User
    {
        return $this->Commande_User;
    }

    public function setCommandeUser(?User $Commande_User): static
    {
        $this->Commande_User = $Commande_User;

        return $this;
    }

    /**
     * @return Collection<int, Consommable>
     */
    public function getCommandeConsommable(): Collection
    {
        return $this->Commande_Consommable;
    }

    public function addCommandeConsommable(Consommable $commandeConsommable): static
    {
        if (!$this->Commande_Consommable->contains($commandeConsommable)) {
            $this->Commande_Consommable->add($commandeConsommable);
        }

        return $this;
    }

    public function removeCommandeConsommable(Consommable $commandeConsommable): static
    {
        $this->Commande_Consommable->removeElement($commandeConsommable);

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
            $consommable->addConsommableCommande($this);
        }

        return $this;
    }

    public function removeConsommable(Consommable $consommable): static
    {
        if ($this->consommables->removeElement($consommable)) {
            $consommable->removeConsommableCommande($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getCommandeLigneCommande(): Collection
    {
        return $this->Commande_LigneCommande;
    }

    public function addCommandeLigneCommande(LigneCommande $commandeLigneCommande): static
    {
        if (!$this->Commande_LigneCommande->contains($commandeLigneCommande)) {
            $this->Commande_LigneCommande->add($commandeLigneCommande);
            $commandeLigneCommande->setCommande($this);
        }

        return $this;
    }

    public function removeCommandeLigneCommande(LigneCommande $commandeLigneCommande): static
    {
        if ($this->Commande_LigneCommande->removeElement($commandeLigneCommande)) {
            // set the owning side to null (unless already changed)
            if ($commandeLigneCommande->getCommande() === $this) {
                $commandeLigneCommande->setCommande(null);
            }
        }

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
            $ligneCommande->setLigneCommandeCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getLigneCommandeCommande() === $this) {
                $ligneCommande->setLigneCommandeCommande(null);
            }
        }

        return $this;
    }
}
