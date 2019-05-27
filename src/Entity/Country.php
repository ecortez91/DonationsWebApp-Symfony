<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="t_country")
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="country_name", type="string", length=100, nullable=false)
     */
    private $countryName;

    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(string $countryName): self
    {
        $this->countryName = $countryName;

        return $this;
    }


}
