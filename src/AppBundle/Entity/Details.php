<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Details
 *
 * @ORM\Table(name="details")
 * @ORM\Entity
 */
class Details
{


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     */
    protected $number;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="broadcast_date", type="date", nullable=true)
     */
    protected $broadcastDate;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="string", length=30, nullable=true)
     */
    protected $quantity;

    /**
     * @var Products
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Products", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $product;

}

