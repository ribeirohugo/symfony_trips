<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table(name="place", indexes={@ORM\Index(name="fk_place_attraction_type", columns={"attraction_type"}), @ORM\Index(name="fk_place_hosting_type", columns={"hosting_type"}), @ORM\Index(name="fk_place_location", columns={"location"}), @ORM\Index(name="fk_place_type", columns={"place_type"})})
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
    private $timestamp = 'CURRENT_TIMESTAMP';

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
     * @var \AttractionType
     *
     * @ORM\ManyToOne(targetEntity="AttractionType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attraction_type", referencedColumnName="id")
     * })
     */
    private $attractionType;

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


}
