<?php

namespace App\Entity;

use App\Repository\PrescritpionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrescritpionRepository::class)
 */
class Prescritpion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="prescritpions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity=Medication::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $medication;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="boolean")
     */
    private $morning;

    /**
     * @ORM\Column(type="boolean")
     */
    private $noon;

    /**
     * @ORM\Column(type="boolean")
     */
    private $evening;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getMedication(): ?Medication
    {
        return $this->medication;
    }

    public function setMedication(?Medication $medication): self
    {
        $this->medication = $medication;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getMorning(): ?bool
    {
        return $this->morning;
    }

    public function setMorning(bool $morning): self
    {
        $this->morning = $morning;

        return $this;
    }

    public function getNoon(): ?bool
    {
        return $this->noon;
    }

    public function setNoon(bool $noon): self
    {
        $this->noon = $noon;

        return $this;
    }

    public function getEvening(): ?bool
    {
        return $this->evening;
    }

    public function setEvening(bool $evening): self
    {
        $this->evening = $evening;

        return $this;
    }
}
