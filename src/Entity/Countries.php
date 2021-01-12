<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountriesRepository::class)
 */
class Countries
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=63, 
     * options={"collation":"utf8mb4_unicode_ci", "comment":"English country name." })
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=2, nullable=false, 
     * options={"fixed" = true, "collation":"ascii_bin", "comment":"ISO 3166-2 two letter upper case country code." })
     */
    private $iso2;

    /**
     * @ORM\Column(type="string", length=3, nullable=true,
     *  options={"fixed" = true ,"collation":"ascii_bin", "comment":"ISO 3166-3 three letter upper case country code."} )
     */
    private $iso3;

    
    /**
     * 
     * @ORM\OneToMany(targetEntity="App\Entity", mappedBy="")
     */
    private $user_details;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIso2(): ?string
    {
        return $this->iso2;
    }

    public function setIso2(string $iso2): self
    {
        $this->iso2 = $iso2;

        return $this;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(?string $iso3): self
    {
        $this->iso3 = $iso3;

        return $this;
    }
}
