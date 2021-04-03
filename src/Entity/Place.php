<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table(name="place", indexes={@ORM\Index(name="fk_place_hosting_type", columns={"hosting_type"}), @ORM\Index(name="fk_place_location", columns={"location"}), @ORM\Index(name="fk_place_type", columns={"place_type"})})
 * @ORM\Entity
 */
class Place
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
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp;

    /**
     * @var float|null
     *
     * @ORM\Column(name="last_price", type="float", precision=10, scale=0, nullable=true)
     */
    private $lastPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="main_contact", type="string", length=250, nullable=true)
     */
    private $mainContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="positive_points", type="text", length=65535, nullable=true)
     */
    private $positivePoints;

    /**
     * @var string|null
     *
     * @ORM\Column(name="negative_points", type="text", length=65535, nullable=true)
     */
    private $negativePoints;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=250, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="drive_files", type="string", length=250, nullable=true)
     */
    private $driveFiles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stars", type="string", length=1, nullable=true)
     */
    private $stars;

    /**
     * @var \HostingType
     *
     * @ORM\ManyToOne(targetEntity="HostingType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hosting_type", referencedColumnName="id")
     * })
     */
    private $hostingType;

    /**
     * @var \Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location", referencedColumnName="id")
     * })
     */
    private $location;

    /**
     * @var \PlaceType
     *
     * @ORM\ManyToOne(targetEntity="PlaceType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="place_type", referencedColumnName="id")
     * })
     */
    private $placeType;

    /**
     * @ORM\ManyToMany(targetEntity="ContactPlace", inversedBy="places")
     * @ORM\JoinTable(name="contact_place",
     *      joinColumns={@ORM\JoinColumn(name="place", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="contact", referencedColumnName="id")}
     *      )
     */
    private $contacts;

    public function __construct() {
		$this->timestamp = new \DateTime();
		$this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
	    $this->id = $id;

	    return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(?\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getLastPrice(): ?float
    {
        return $this->lastPrice;
    }

    public function setLastPrice(?float $lastPrice): self
    {
        $this->lastPrice = $lastPrice;

        return $this;
    }

    public function getMainContact(): ?string
    {
        return $this->mainContact;
    }

    public function setMainContact(?string $mainContact): self
    {
        $this->mainContact = $mainContact;

        return $this;
    }

    public function getPositivePoints(): ?string
    {
        return $this->positivePoints;
    }

    public function setPositivePoints(?string $positivePoints): self
    {
        $this->positivePoints = $positivePoints;

        return $this;
    }

    public function getNegativePoints(): ?string
    {
        return $this->negativePoints;
    }

    public function setNegativePoints(?string $negativePoints): self
    {
        $this->negativePoints = $negativePoints;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDriveFiles(): ?string
    {
        return $this->driveFiles;
    }

    public function setDriveFiles(?string $driveFiles): self
    {
        $this->driveFiles = $driveFiles;

        return $this;
    }

    public function getStars(): ?string
    {
        return $this->stars;
    }

    public function setStars(?string $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    public function getHostingType(): ?HostingType
    {
        return $this->hostingType;
    }

    public function setHostingType(?HostingType $hostingType): self
    {
        $this->hostingType = $hostingType;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPlaceType(): ?PlaceType
    {
        return $this->placeType;
    }

    public function setPlaceType(?PlaceType $placeType): self
    {
        $this->placeType = $placeType;

        return $this;
    }


    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function hasContacts() {
        return (bool) $this->getContacts()->count();
    }

    public function addContact(Contact $contact): self
    {
        $this->contacts->add($contact);

        return $this;
    }
}
