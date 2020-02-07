<?php

namespace App\Entity;

use OpenApi\Annotations as OA;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
//I used Assert To verify our Inputs
use Symfony\Component\Validator\Constraints as Assert;

// Property function to specify the type

/**
 * @OA\Schema()
 * @ORM\Entity(repositoryClass="App\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @OA\Property(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

// Here i used Asser motequl so the user can not input "Free", "Offer", "Book", "Website"

    /**
     * @ORM\Column(type="string", length=255)
     * @OA\Property(type="string")
     * @Assert\NotBlank
     * @Assert\Length(min=5,max=60)
     * @Assert\NotEqualTo("Free")
     * @Assert\NotEqualTo("Offer")
     * @Assert\NotEqualTo("Book")
     * @Assert\NotEqualTo("Website")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @OA\Property(type="string")
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     * @OA\Property(type="integer")
     */
    private $rating;

        // I use Assert Url to check the url

    /**
     * @ORM\Column(type="string", length=255)
     * @OA\Property(type="string")
     * @Assert\Url
     */
    private $image;

//  I used assert LessThanOrEqual so the notation can never be under 1000

    /**
     * @ORM\Column(type="integer")
     * @OA\Property(type="integer")
     * @Assert\LessThanOrEqual(
     *     value = 1000
     * )
     */
    private $reputation;

    /**
     * @ORM\Column(type="integer")
     * @OA\Property(type="integer")
     * @Assert\NotBlank
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * @OA\Property(type="integer")
     */
    private $availability;

    //  Location type object because we need to get location infos of every Hotel
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Location", mappedBy="HotelId", orphanRemoval=true)
     * @OA\Property(type="object",ref="#/components/schemas/Location")
     */
    private $locations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="relation")
     */
    private $userId;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getReputation(): ?int
    {
        return $this->reputation;
    }

    public function setReputation(int $reputation): self
    {
        $this->reputation = $reputation;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAvailability(): ?int
    {
        return $this->availability;
    }

    public function setAvailability(int $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setHotelId($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
            // set the owning side to null (unless already changed)
            if ($location->getHotelId() === $this) {
                $location->setHotelId(null);
            }
        }

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
