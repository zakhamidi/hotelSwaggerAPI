<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use OpenApi\Annotations as OA;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 * @OA\Schema()
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @OA\Property(type="string")
     * @Assert\NotBlank
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=255)
     * @OA\Property(type="string")
     * @Assert\NotBlank
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * @OA\Property(type="string")
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     * @OA\Property(type="integer")
     * @Assert\NotBlank
     * * @Assert\Length(
     *      min = 5,
     *      max = 5
     * )
     */
    private $zipcode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotel", inversedBy="locations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hotelId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getHotelId(): ?Hotel
    {
        return $this->HotelId;
    }

    public function setHotelId(?Hotel $HotelId): self
    {
        $this->HotelId = $HotelId;

        return $this;
    }
}
