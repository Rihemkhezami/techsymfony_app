<?php

namespace App\Entity;

use App\Repository\HistoriqueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueRepository::class)]
class Historique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_auth = null;

    #[ORM\OneToOne(inversedBy: 'historique', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Historique_User = null;

    #[ORM\OneToOne(mappedBy: 'User_Historique', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAuth(): ?\DateTimeInterface
    {
        return $this->date_auth;
    }

    public function setDateAuth(\DateTimeInterface $date_auth): static
    {
        $this->date_auth = $date_auth;

        return $this;
    }

    public function getHistoriqueUser(): ?User
    {
        return $this->Historique_User;
    }

    public function setHistoriqueUser(User $Historique_User): static
    {
        $this->Historique_User = $Historique_User;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        // set the owning side of the relation if necessary
        if ($user->getUserHistorique() !== $this) {
            $user->setUserHistorique($this);
        }

        $this->user = $user;

        return $this;
    }


}
