<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Edition
 *
 * @ORM\Table(name="edition", indexes={@ORM\Index(name="fk_edition_activity", columns={"activity"})})
 * @ORM\Entity
 */
class Edition
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
     * @ORM\Column(name="semester", type="string", length=250, nullable=true)
     */
    private $semester;

    /**
     * @var \Activity
     *
     * @ORM\ManyToOne(targetEntity="Activity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activity", referencedColumnName="id")
     * })
     */
    private $activity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSemester(): ?string
    {
        return $this->semester;
    }

    public function setSemester(?string $semester): self
    {
        $this->semester = $semester;

        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }


}
