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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users", inversedBy="", cascade={"persist", "remove" })
     */
    protected $user;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPercentageCommission()
    {
        return $this->percentageCommission;
    }

    /**
     * @param string $percentageCommission
     */
    public function setPercentageCommission(string $percentageCommission)
    {
        $this->percentageCommission = $percentageCommission;
    }

    /**
     * @return Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param Users $user
     */
    public function setUser(Users $user)
    {
        $this->user = $user;
    }
}


