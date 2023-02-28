<?php

namespace App\Entity;

use App\Repository\ChevauxCoursesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChevauxCoursesRepository::class)
 */
class ChevauxCourses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $resultat;

    /**
     * @ORM\ManyToOne(targetEntity=Chevaux::class, inversedBy="lesChevauxCourses")
     */
    private $leCheval;

    /**
     * @ORM\ManyToOne(targetEntity=Courses::class, inversedBy="lesCoursesChevaux")
     */
    private $laCourse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultat(): ?int
    {
        return $this->resultat;
    }

    public function setResultat(int $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getLeCheval(): ?Chevaux
    {
        return $this->leCheval;
    }

    public function setLeCheval(?Chevaux $leCheval): self
    {
        $this->leCheval = $leCheval;

        return $this;
    }

    public function getLaCourse(): ?Courses
    {
        return $this->laCourse;
    }

    public function setLaCourse(?Courses $laCourse): self
    {
        $this->laCourse = $laCourse;

        return $this;
    }
}
