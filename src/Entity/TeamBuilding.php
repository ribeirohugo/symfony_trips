<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TeamBuilding
 *
 * @ORM\Table(name="team_building", indexes={@ORM\Index(name="fk_team_building_activity", columns={"activity"})})
 * @ORM\Entity
 */
class TeamBuilding
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
     * @ORM\Column(name="url", type="string", length=250, nullable=true)
     */
    private $url;

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
