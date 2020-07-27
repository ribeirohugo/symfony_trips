<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table(name="report", indexes={@ORM\Index(name="fk_report_edition", columns={"edition"})})
 * @ORM\Entity
 */
class Report
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
