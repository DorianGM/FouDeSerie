<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=Serie::class, inversedBy="lesGenres")
     */
    private $lesSeries;

    public function __construct()
    {
        $this->lesSeries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Serie[]
     */
    public function getLesSeries(): Collection
    {
        return $this->lesSeries;
    }

    public function addLesSeries(Serie $lesSeries): self
    {
        if (!$this->lesSeries->contains($lesSeries)) {
            $this->lesSeries[] = $lesSeries;
        }

        return $this;
    }

    public function removeLesSeries(Serie $lesSeries): self
    {
        $this->lesSeries->removeElement($lesSeries);

        return $this;
    }
}
