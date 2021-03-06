<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity(repositoryClass=App\Repository\SerieRepository::class)
 */
class Serie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resume", type="text", length=255, nullable=true)
     */
    private $resume;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="duree", type="time", nullable=true)
     */
    private $duree;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="premiereDiffusion", type="date", nullable=true)
     */
    private $premierediffusion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="lesSeries")
     */
    private $lesGenres;

    /**
     * @ORM\Column(type="integer")
     */
    private $likes;

    public function __construct()
    {
        $this->lesGenres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getPremierediffusion(): ?\DateTimeInterface
    {
        return $this->premierediffusion;
    }

    public function setPremierediffusion(?\DateTimeInterface $premierediffusion): self
    {
        $this->premierediffusion = $premierediffusion;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getLesGenres(): Collection
    {
        return $this->lesGenres;
    }

    public function addLesGenre(Genre $lesGenre): self
    {
        if (!$this->lesGenres->contains($lesGenre)) {
            $this->lesGenres[] = $lesGenre;
            $lesGenre->addLesSeries($this);
        }

        return $this;
    }

    public function removeLesGenre(Genre $lesGenre): self
    {
        if ($this->lesGenres->removeElement($lesGenre)) {
            $lesGenre->removeLesSeries($this);
        }

        return $this;
    }

    public function getLikes(): ?int
    {
        return $this->likes;
    }

    public function setLikes(int $likes): self
    {
        $this->likes = $likes;

        return $this;
    }


}
