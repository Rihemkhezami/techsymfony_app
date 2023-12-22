<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_nais = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column]
    private ?int $nombre_jrs_conge = null;



    #[ORM\OneToMany(mappedBy: 'Conge_User', targetEntity: Conge::class)]
    private Collection $conges;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Conge::class)]
    private Collection $User_Conge;

    #[ORM\OneToMany(mappedBy: 'Reclamation_User', targetEntity: Reclamation::class)]
    private Collection $reclamations;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Reclamation::class)]
    private Collection $User_Reclamation;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commande::class)]
    private Collection $User_Commande;

    #[ORM\OneToMany(mappedBy: 'Commande_User', targetEntity: Commande::class)]
    private Collection $commandes;


    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Historique::class)]
    private Collection $historiques;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Equipement::class)]
    private Collection $equipements;

    public function __construct()
    {
        $this->conges = new ArrayCollection();
        $this->User_Conge = new ArrayCollection();
        $this->reclamations = new ArrayCollection();
        $this->User_Reclamation = new ArrayCollection();
        $this->User_Commande = new ArrayCollection();
        $this->commandes = new ArrayCollection();

        $this->historiques = new ArrayCollection();
        $this->equipements = new ArrayCollection();
    }

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNais(): ?\DateTimeInterface
    {
        return $this->date_nais;
    }

    public function setDateNais(\DateTimeInterface $date_nais): static
    {
        $this->date_nais = $date_nais;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getNombreJrsConge(): ?int
    {
        return $this->nombre_jrs_conge;
    }

    public function setNombreJrsConge(int $nombre_jrs_conge): static
    {
        $this->nombre_jrs_conge = $nombre_jrs_conge;

        return $this;
    }

    public function getHistorique(): ?Historique
    {
        return $this->historique;
    }

    public function setHistorique(Historique $historique): static
    {
        // set the owning side of the relation if necessary
        if ($historique->getHistoriqueUser() !== $this) {
            $historique->setHistoriqueUser($this);
        }

        $this->historique = $historique;

        return $this;
    }



    /**
     * @return Collection<int, Conge>
     */
    public function getConges(): Collection
    {
        return $this->conges;
    }

    public function addConge(Conge $conge): static
    {
        if (!$this->conges->contains($conge)) {
            $this->conges->add($conge);
            $conge->setCongeUser($this);
        }

        return $this;
    }

    public function removeConge(Conge $conge): static
    {
        if ($this->conges->removeElement($conge)) {
            // set the owning side to null (unless already changed)
            if ($conge->getCongeUser() === $this) {
                $conge->setCongeUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Conge>
     */
    public function getUserConge(): Collection
    {
        return $this->User_Conge;
    }

    public function addUserConge(Conge $userConge): static
    {
        if (!$this->User_Conge->contains($userConge)) {
            $this->User_Conge->add($userConge);
            $userConge->setUser($this);
        }

        return $this;
    }

    public function removeUserConge(Conge $userConge): static
    {
        if ($this->User_Conge->removeElement($userConge)) {
            // set the owning side to null (unless already changed)
            if ($userConge->getUser() === $this) {
                $userConge->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): static
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations->add($reclamation);
            $reclamation->setReclamationUser($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): static
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getReclamationUser() === $this) {
                $reclamation->setReclamationUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getUserReclamation(): Collection
    {
        return $this->User_Reclamation;
    }

    public function addUserReclamation(Reclamation $userReclamation): static
    {
        if (!$this->User_Reclamation->contains($userReclamation)) {
            $this->User_Reclamation->add($userReclamation);
            $userReclamation->setUser($this);
        }

        return $this;
    }

    public function removeUserReclamation(Reclamation $userReclamation): static
    {
        if ($this->User_Reclamation->removeElement($userReclamation)) {
            // set the owning side to null (unless already changed)
            if ($userReclamation->getUser() === $this) {
                $userReclamation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getUserCommande(): Collection
    {
        return $this->User_Commande;
    }

    public function addUserCommande(Commande $userCommande): static
    {
        if (!$this->User_Commande->contains($userCommande)) {
            $this->User_Commande->add($userCommande);
            $userCommande->setUser($this);
        }

        return $this;
    }

    public function removeUserCommande(Commande $userCommande): static
    {
        if ($this->User_Commande->removeElement($userCommande)) {
            // set the owning side to null (unless already changed)
            if ($userCommande->getUser() === $this) {
                $userCommande->setUser(null);
            }
        }

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
            $commande->setCommandeUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getCommandeUser() === $this) {
                $commande->setCommandeUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */

    public function getHistoriques(): Collection
    {
        return $this->historiques;
    }

    public function addHistorique(Historique $historique): static
    {
        if (!$this->historiques->contains($historique)) {
            $this->historiques->add($historique);
            $historique->setUserId($this);
        }

        return $this;
    }

    public function removeHistorique(Historique $historique): static
    {
        if ($this->historiques->removeElement($historique)) {
            // set the owning side to null (unless already changed)
            if ($historique->getUserId() === $this) {
                $historique->setUserId(null);
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
            $equipement->setUser($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): static
    {
        if ($this->equipements->removeElement($equipement)) {
            // set the owning side to null (unless already changed)
            if ($equipement->getUser() === $this) {
                $equipement->setUser(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom." ".$this->prenom;
    }



}
