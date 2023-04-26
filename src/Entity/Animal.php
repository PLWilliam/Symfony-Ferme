<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\ManyToOne]
    private ?espece $espece = null;

    #[ORM\ManyToOne]
    private ?Ferme $ferme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEspece(): ?espece
    {
        return $this->espece;
    }

    public function setEspece(?espece $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    public function getFerme(): ?Ferme
    {
        return $this->ferme;
    }

    public function setFerme(?Ferme $ferme): self
    {
        $this->ferme = $ferme;

        return $this;
    }
}
