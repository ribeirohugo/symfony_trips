<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Budget
 *
 * @ORM\Table(name="budget", indexes={@ORM\Index(name="fk_edition_budget", columns={"edition"})})
 * @ORM\Entity
 */
class Budget
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
     * @var \Edition
     *
     * @ORM\ManyToOne(targetEntity="Edition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="edition", referencedColumnName="id")
     * })
     */
    private $edition;


}
