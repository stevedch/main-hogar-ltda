<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Products
{
    const STATUS_GOOD = 'status.good';
    const STATUS_BAD = 'status.bad';
    const STATUS_NOT_MARKETED = 'status.not.marketed';

    /**
     * @ORM\Id @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="string", length=30, nullable=true)
     */
    protected $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="price_net", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $priceNet;

    /**
     * @var Cellar
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cellar", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $cellar;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=30, nullable=true)
     */
    protected $status = self::STATUS_GOOD;

}

