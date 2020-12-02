<?php

namespace App\Entity;

use App\Repository\BloodsugarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BloodsugarRepository::class)
 */
class Bloodsugar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"apiv0"})
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Groups({"apiv0"})
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 0.4,
     *      max = 4,
     *      notInRangeMessage = "Votre glycémie doit être entre 0.4 et 4 g/L",
     * )
     */
    private $rate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bloodsugars")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"apiv0"})
     */
    private $correction;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $corrected;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"apiv0"})
     */
    private $normality;

    /**
     * @ORM\Column(type="date")
     * @Groups({"apiv0"})
     * @Assert\LessThanOrEqual("today", message="La date de votre glycémie ne peut être dans le futur")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     * @Groups({"apiv0"})
     * @Assert\Time
     * @var string A "H:i" formatted value
     */
    private $time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCorrection(): ?string
    {
        return $this->correction;
    }

    public function setCorrection(?string $correction): self
    {
        $this->correction = $correction;

        return $this;
    }

    public function getCorrected(): ?bool
    {
        return $this->corrected;
    }

    public function setCorrected(bool $corrected): self
    {
        $this->corrected = $corrected;

        return $this;
    }

    public function getNormality(): ?string
    {
        return $this->normality;
    }

    public function setNormality(string $normality): self
    {
        $this->normality = $normality;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }
}
