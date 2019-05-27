<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institution
 *
 * @ORM\Table(name="t_institution", indexes={@ORM\Index(name="fk_institution_state", columns={"state_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\InstitutionRepository")
 */
class Institution
{
    /**
     * @var int
     *
     * @ORM\Column(name="institution_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $institutionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="institution_name", type="string", length=100, nullable=true)
     */
    private $institutionName;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="registration_date", type="date", nullable=true)
     */
    private $registrationDate;

    /**
     * @var \State
     *
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_id", referencedColumnName="state_id")
     * })
     */
    private $state;

    public function getInstitutionId(): ?int
    {
        return $this->institutionId;
    }

    public function getInstitutionName(): ?Institution
    {
        return $this->institutionName;
    }

    public function __toString() 
    {
        return (string) $this->institutionName; 
    }

    public function setInstitutionName(?string $institutionName): self
    {
        $this->institutionName = $institutionName;

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

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }
}
?>