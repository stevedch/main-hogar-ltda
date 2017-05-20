<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplier
 *
 * @ORM\Table(name="supplier")
 * @ORM\Entity
 */
class Supplier
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
     * @ORM\Column(name="code", type="string", length=254, nullable=true)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=30, nullable=true)
     */
    protected $address;

    /**
     * @var Details
     * @ORM\OneToMany(targetEntity="Details", mappedBy="supplier", cascade={"persist", "remove"})
     */
    protected $detail;

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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return Details
     */
    public function getDetail(): Details
    {
        return $this->detail;
    }

    /**
     * @param Details $detail
     */
    public function setDetail(Details $detail)
    {
        $this->detail = $detail;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detail = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add detail
     *
     * @param \AppBundle\Entity\Details $detail
     *
     * @return Supplier
     */
    public function addDetail(\AppBundle\Entity\Details $detail)
    {
        $this->detail[] = $detail;

        return $this;
    }

    /**
     * Remove detail
     *
     * @param \AppBundle\Entity\Details $detail
     */
    public function removeDetail(\AppBundle\Entity\Details $detail)
    {
        $this->detail->removeElement($detail);
    }
}
