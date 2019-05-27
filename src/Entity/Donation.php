<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donation
 *
 * @ORM\Table(name="t_donation", indexes={@ORM\Index(name="fk_donation_institution", columns={"institution_id"}), @ORM\Index(name="fk_donation_user", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DonationRepository")
 */
class Donation
{
    /**
     * @var int
     *
     * @ORM\Column(name="donation_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $donationId;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $amount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_number", type="string", length=20, nullable=true)
     */
    private $ccNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cc_type", type="string", length=2, nullable=true)
     */
    private $ccType;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="donation_date", type="datetime", nullable=true)
     */
    private $donationDate;

    /**
     * @var \Institution
     *
     * @ORM\ManyToOne(targetEntity="Institution", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="institution_id", referencedColumnName="institution_id")
     * })
     */
    private $institution;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;
    
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

    public function getDonationId(): ?int
    {
        return $this->donationId;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCcNumber(): ?string
    {
        return $this->ccNumber;
    }

    public function setCcNumber(?string $ccNumber): self
    {
        $this->ccNumber = $ccNumber;

        return $this;
    }

    public function getCcType(): ?string
    {
        return $this->ccType;
    }

    public function setCcType(?string $ccType): self
    {
        $this->ccType = $ccType;

        return $this;
    }

    public function getDonationDate()
    {
        $returnDate = $this->donationDate->format('m/d/Y'); // for example
        return $returnDate;
    }

    public function setDonationDate(?\DateTimeInterface $donationDate): self
    {
        $this->donationDate = $donationDate;

        return $this;
    }

    public function getInstitution()
    {
        return $this->institution;
    }

    public function setInstitution(?Institution $institution): self
    {
        $this->institution = $institution;

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
    
    public function __toString() 
    {
        return (string) $this->$user; 
    }


}
