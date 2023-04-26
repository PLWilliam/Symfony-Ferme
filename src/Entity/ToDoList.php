<?php

namespace App\Entity;

use App\Repository\ToDoListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToDoListRepository::class)]
class ToDoList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Agriculteur $Agriculteur = null;

    #[ORM\ManyToOne]
    private ?Tache $Tache = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgriculteur(): ?Agriculteur
    {
        return $this->Agriculteur;
    }

    public function setAgriculteur(?Agriculteur $Agriculteur): self
    {
        $this->Agriculteur = $Agriculteur;

        return $this;
    }

    public function getTache(): ?Tache
    {
        return $this->Tache;
    }

    public function setTache(?Tache $Tache): self
    {
        $this->Tache = $Tache;

        return $this;
    }
}
