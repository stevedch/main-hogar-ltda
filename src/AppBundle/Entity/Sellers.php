<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sellers
 *
 * @ORM\Table(name="sellers")
 * @ORM\Entity
 */
class Sellers
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
     * @ORM\Column(name="percentage_commission", type="string", length=45, nullable=true)
     */
    protected $percentageCommission;

    /**
     * @var Users
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $user;

}


