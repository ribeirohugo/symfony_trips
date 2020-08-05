<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PlaceType
 *
 * @ORM\Table(name="place_type")
 * @ORM\Entity
 */
class PlaceType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Place", mappedBy="placeType")
     */
    private $places;

    public function __construct() {
		$this->places = new ArrayCollection();
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Places[]
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

	public function hasPlaces() {
		return (bool) $this->getPlaces()->count();
	}
}
