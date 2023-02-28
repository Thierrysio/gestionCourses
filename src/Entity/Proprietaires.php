<?php

namespace App\Entity;

use App\Repository\ProprietairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProprietairesRepository::class)
 */
class Proprietaires
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
    private $nomProprietaire;

    /**
     * @ORM\OneToMany(targetEntity=Chevaux::class, mappedBy="leProprietaire")
     */
    private $lesChevaux;

    public function __construct()
    {
        $this->lesChevaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProprietaire(): ?string
    {
        return $this->nomProprietaire;
    }

    public function setNomProprietaire(string $nomProprietaire): self
    {
        $this->nomProprietaire = $nomProprietaire;

        return $this;
    }

    /**
     * @return Collection<int, Chevaux>
     */
    public function getLesChevaux(): Collection
    {
        return $this->lesChevaux;
    }

    public function addLesChevaux(Chevaux $lesChevaux): self
    {
        if (!$this->lesChevaux->contains($lesChevaux)) {
            $this->lesChevaux[] = $lesChevaux;
            $lesChevaux->setLeProprietaire($this);
        }

        return $this;
    }

    public function removeLesChevaux(Chevaux $lesChevaux): self
    {
        if ($this->lesChevaux->removeElement($lesChevaux)) {
            // set the owning side to null (unless already changed)
            if ($lesChevaux->getLeProprietaire() === $this) {
                $lesChevaux->setLeProprietaire(null);
            }
        }

        return $this;
    }
}
