<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactPlace
 *
 * @ORM\Table(name="contact_place", indexes={@ORM\Index(name="fk_contact_place_contact", columns={"contact"}), @ORM\Index(name="fk_contact_place_place", columns={"place"})})
 * @ORM\Entity
 */
class ContactPlace
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
     * @var \Contact
     *
     * @ORM\ManyToOne(targetEntity="Contact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact", referencedColumnName="id")
     * })
     */
    private $contact;

    /**
     * @var \Place
     *
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="place", referencedColumnName="id")
     * })
     */
    private $place;


}
