<?php

namespace App\Entity;

use App\Repository\BloodsugarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
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
     */
    private $rate;

    /**
     * @ORM\Column(type="date")
     * @Groups({"apiv0"})
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     * @Groups({"apiv0"})
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bloodsugars")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"apiv0"})
     */
    private $datetime;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

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

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }
}
