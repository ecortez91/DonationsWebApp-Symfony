<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="t_state", indexes={@ORM\Index(name="fk_country_state", columns={"country_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\StateRepository")
 */
class State
{
    /**
     * @var int
     *
     * @ORM\Column(name="state_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state_name", type="string", length=100, nullable=true)
     */
    private $stateName;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     * })
     */
    private $country;

    public function getStateId(): ?int
    {
        return $this->stateId;
    }

    public function getStateName(): ?string
    {
        return $this->stateName;
    }

    public function setStateName(?string $stateName): self
    {
        $this->stateName = $stateName;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }


}
