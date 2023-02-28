<?php

namespace App\Entity;

use App\Repository\CoursesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursesRepository::class)
 */
class Courses
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
    private $nomCourse;

    /**
     * @ORM\Column(type="integer")
     */
    private $gain;

    /**
     * @ORM\OneToMany(targetEntity=ChevauxCourses::class, mappedBy="laCourse")
     */
    private $lesCoursesChevaux;

    public function __construct()
    {
        $this->lesCoursesChevaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCourse(): ?string
    {
        return $this->nomCourse;
    }

    public function setNomCourse(string $nomCourse): self
    {
        $this->nomCourse = $nomCourse;

        return $this;
    }

    public function getGain(): ?int
    {
        return $this->gain;
    }

    public function setGain(int $gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    /**
     * @return Collection<int, ChevauxCourses>
     */
    public function getLesCoursesChevaux(): Collection
    {
        return $this->lesCoursesChevaux;
    }

    public function addLesCoursesChevaux(ChevauxCourses $lesCoursesChevaux): self
    {
        if (!$this->lesCoursesChevaux->contains($lesCoursesChevaux)) {
            $this->lesCoursesChevaux[] = $lesCoursesChevaux;
            $lesCoursesChevaux->setLaCourse($this);
        }

        return $this;
    }

    public function removeLesCoursesChevaux(ChevauxCourses $lesCoursesChevaux): self
    {
        if ($this->lesCoursesChevaux->removeElement($lesCoursesChevaux)) {
            // set the owning side to null (unless already changed)
            if ($lesCoursesChevaux->getLaCourse() === $this) {
                $lesCoursesChevaux->setLaCourse(null);
            }
        }

        return $this;
    }
}
