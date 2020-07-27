<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CityTour
 *
 * @ORM\Table(name="city_tour", indexes={@ORM\Index(name="fk_city_tour_activity", columns={"activity"})})
 * @ORM\Entity
 */
class CityTour
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
     * @ORM\Column(name="title", type="string", length=250, nullable=true)
     */
    private $title;

    /**
     * @var \Activity
     *
     * @ORM\ManyToOne(targetEntity="Activity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activity", referencedColumnName="id")
     * })
     */
    private $activity;


}
