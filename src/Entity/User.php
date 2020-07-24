<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Bloodsugar::class, mappedBy="user")
     */
    private $bloodsugars;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="float")
     */
    private $target_min;

    /**
     * @ORM\Column(type="float")
     */
    private $target_max;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $doctor_name;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $diabetes_type;

    public function __construct()
    {
        $this->bloodsugars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Bloodsugar[]
     */
    public function getBloodsugars(): Collection
    {
        return $this->bloodsugars;
    }

    public function addBloodsugar(Bloodsugar $bloodsugar): self
    {
        if (!$this->bloodsugars->contains($bloodsugar)) {
            $this->bloodsugars[] = $bloodsugar;
            $bloodsugar->setUser($this);
        }

        return $this;
    }

    public function removeBloodsugar(Bloodsugar $bloodsugar): self
    {
        if ($this->bloodsugars->contains($bloodsugar)) {
            $this->bloodsugars->removeElement($bloodsugar);
            // set the owning side to null (unless already changed)
            if ($bloodsugar->getUser() === $this) {
                $bloodsugar->setUser(null);
            }
        }

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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function gettargetMin(): ?float
    {
        return $this->target_min;
    }

    public function settargetMin(float $target_min): self
    {
        $this->target_min = $target_min;

        return $this;
    }

    public function getTargetMax(): ?float
    {
        return $this->target_max;
    }

    public function setTargetMax(float $target_max): self
    {
        $this->target_max = $target_max;

        return $this;
    }

    public function getDoctorName(): ?string
    {
        return $this->doctor_name;
    }

    public function setDoctorName(?string $doctor_name): self
    {
        $this->doctor_name = $doctor_name;

        return $this;
    }

    public function getDiabetesType(): ?string
    {
        return $this->diabetes_type;
    }

    public function setDiabetesType(string $diabetes_type): self
    {
        $this->diabetes_type = $diabetes_type;

        return $this;
    }
}
