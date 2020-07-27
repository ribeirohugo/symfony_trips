<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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


}
