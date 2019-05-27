<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="t_person")
 * @ORM\Entity
 */
class Person
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="id_number", type="string", length=20, nullable=false)
     */
    private $idNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     * )
     */
    private $email;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="registration_date", type="date", nullable=true)
     */
    private $registrationDate;
    
    private $message;
    
    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): self
    {
        $this->message= $message;

        return $this;
    }

    public function __construct() {
    }

    public function getIdNumber(): ?string
    {
        return $this->idNumber;
    }

    public function setIdNumber(string $idNumber): self
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
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


    public function getBirthdate()
    {
        $returnDate = '';
        if ($this->birthdate == 'NULL') {
           $returnDate = $this->birthdate->format('Y-m-d');
        }
        return $returnDate;
    }

    public function setBirthdate($birthdate) 
    {
        $this->birthdate = new \DateTime($birthdate);

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(?\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

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

    public function getUsername(): ?string
    {
        return $this->user->username;
    }

    public function setUsername(?string $username): self
    {
        $this->user->username = $username;

        return $this;
    }

}
