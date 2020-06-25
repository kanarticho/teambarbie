<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="patients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $doctor;

    /**
     * @ORM\OneToMany(targetEntity=Prescritpion::class, mappedBy="patient", orphanRemoval=true)
     */
    private $prescritpions;

    /**
     * @ORM\OneToMany(targetEntity=Moodday::class, mappedBy="patient", orphanRemoval=true)
     */
    private $mooddays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    public function __construct()
    {
        $this->prescritpions = new ArrayCollection();
        $this->mooddays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }

    public function setDoctor(?Doctor $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * @return Collection|Prescritpion[]
     */
    public function getPrescritpions(): Collection
    {
        return $this->prescritpions;
    }

    public function addPrescritpion(Prescritpion $prescritpion): self
    {
        if (!$this->prescritpions->contains($prescritpion)) {
            $this->prescritpions[] = $prescritpion;
            $prescritpion->setPatient($this);
        }

        return $this;
    }

    public function removePrescritpion(Prescritpion $prescritpion): self
    {
        if ($this->prescritpions->contains($prescritpion)) {
            $this->prescritpions->removeElement($prescritpion);
            // set the owning side to null (unless already changed)
            if ($prescritpion->getPatient() === $this) {
                $prescritpion->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Moodday[]
     */
    public function getMooddays(): Collection
    {
        return $this->mooddays;
    }

    public function addMoodday(Moodday $moodday): self
    {
        if (!$this->mooddays->contains($moodday)) {
            $this->mooddays[] = $moodday;
            $moodday->setPatient($this);
        }

        return $this;
    }

    public function removeMoodday(Moodday $moodday): self
    {
        if ($this->mooddays->contains($moodday)) {
            $this->mooddays->removeElement($moodday);
            // set the owning side to null (unless already changed)
            if ($moodday->getPatient() === $this) {
                $moodday->setPatient(null);
            }
        }

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
