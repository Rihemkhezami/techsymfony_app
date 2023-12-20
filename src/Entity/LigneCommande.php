<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'Commande_LigneCommande')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $LigneCommande_Commande = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Consommable $LigneCommande_Consommable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }

    public function getLigneCommandeCommande(): ?Commande
    {
        return $this->LigneCommande_Commande;
    }

    public function setLigneCommandeCommande(?Commande $LigneCommande_Commande): static
    {
        $this->LigneCommande_Commande = $LigneCommande_Commande;

        return $this;
    }

    public function getLigneCommandeConsommable(): ?Consommable
    {
        return $this->LigneCommande_Consommable;
    }

    public function setLigneCommandeConsommable(?Consommable $LigneCommande_Consommable): static
    {
        $this->LigneCommande_Consommable = $LigneCommande_Consommable;

        return $this;
    }
}
