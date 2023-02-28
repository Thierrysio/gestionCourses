<?php

namespace App\Entity;

use App\Repository\ChevauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChevauxRepository::class)
 */
class Chevaux
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
    private $nomCheval;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixAchat;

    /**
     * @ORM\Column(type="integer")
     */
    private $PrixRevente;

    /**
     * @ORM\ManyToOne(targetEntity=Proprietaires::class, inversedBy="lesChevaux")
     */
    private $leProprietaire;

    /**
     * @ORM\OneToMany(targetEntity=ChevauxCourses::class, mappedBy="leCheval")
     */
    private $lesChevauxCourses;

    public function __construct()
    {
        $this->lesChevauxCourses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCheval(): ?string
    {
        return $this->nomCheval;
    }

    public function setNomCheval(string $nomCheval): self
    {
        $this->nomCheval = $nomCheval;

        return $this;
    }

    public function getPrixAchat(): ?int
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(int $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getPrixRevente(): ?int
    {
        return $this->PrixRevente;
    }

    public function setPrixRevente(int $PrixRevente): self
    {
        $this->PrixRevente = $PrixRevente;

        return $this;
    }

    public function getLeProprietaire(): ?Proprietaires
    {
        return $this->leProprietaire;
    }

    public function setLeProprietaire(?Proprietaires $leProprietaire): self
    {
        $this->leProprietaire = $leProprietaire;

        return $this;
    }

    /**
     * @return Collection<int, ChevauxCourses>
     */
    public function getLesChevauxCourses(): Collection
    {
        return $this->lesChevauxCourses;
    }

    public function addLesChevauxCourse(ChevauxCourses $lesChevauxCourse): self
    {
        if (!$this->lesChevauxCourses->contains($lesChevauxCourse)) {
            $this->lesChevauxCourses[] = $lesChevauxCourse;
            $lesChevauxCourse->setLeCheval($this);
        }

        return $this;
    }

    public function removeLesChevauxCourse(ChevauxCourses $lesChevauxCourse): self
    {
        if ($this->lesChevauxCourses->removeElement($lesChevauxCourse)) {
            // set the owning side to null (unless already changed)
            if ($lesChevauxCourse->getLeCheval() === $this) {
                $lesChevauxCourse->setLeCheval(null);
            }
        }

        return $this;
    }

    public function getBenefice(): int
    {
        return $this->getPrixRevente()-$this->getPrixAchat();
    }

    public function getGainsTotaux(): int
    {
        $resulat = 0;
        foreach ( $this->getLesChevauxCourses() as $unecourseCheval) 
        {
            if($unecourseCheval->getResultat() == 1)
            {
                $resulat += $unecourseCheval->getLaCourse()->getGain();
            }
        }
        return $resulat;
}
}