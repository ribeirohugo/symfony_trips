<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductActivity
 *
 * @ORM\Table(name="product_activity", indexes={@ORM\Index(name="fk_product_activity_activity", columns={"activity"}), @ORM\Index(name="fk_product_activity_product", columns={"product"})})
 * @ORM\Entity
 */
class ProductActivity
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
     * @var \Activity
     *
     * @ORM\ManyToOne(targetEntity="Activity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activity", referencedColumnName="id")
     * })
     */
    private $activity;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product", referencedColumnName="id")
     * })
     */
    private $product;


}
