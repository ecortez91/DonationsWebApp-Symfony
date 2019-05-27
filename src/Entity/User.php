<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="t_user", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"}), @ORM\UniqueConstraint(name="username", columns={"username"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
     /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique = true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, unique = true)
     * @Assert\Length(
     *      min = 6,
     *      max = 20,
     *      minMessage = "Password should have at least 6 characters",
     *      maxMessage = "Password can't be longer than 20 characters"
     * )
     */
    private $password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_country", type="boolean", nullable=true)
     */
    private $isCountry;

    public function getIsCountry(): ?bool
    {
        return $this->isCountry;
    }

    public function setIsCountry(?bool $isCountry): self
    {
        $this->isCountry = $isCountry;

        return $this;
    }

    public function setId(?int $id): ?int
    {
        $this->id = $id;
        return $this->id;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function __toString() 
    {
        return (string) $this->institutionName; 
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getRoles() {
        return [
            'ROLE_USER'
        ];
    }
    public function getSalt() {
    }
    
    public function eraseCredentials() {
    }

    public function serialize() {
        return serialize([
            $this->id,
            $this->username,
            $this->password
        ]);
    }

    public function unserialize($string) {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($string, ['allowed_classes' => false]);
    }
}
