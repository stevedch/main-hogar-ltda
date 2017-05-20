<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity
 */
class Customers
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
     * @ORM\Column(name="rut", type="string", length=12, nullable=false)
     */
    protected $rut;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="mothers_last_name", type="string", length=45, nullable=true)
     */
    protected $mothersLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=30, nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=true)
     */
    protected $email;

    /**
     * @var Details

     * @ORM\OneToMany(targetEntity="Details", mappedBy="customer", cascade={"persist", "remove"})
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
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * @param string $rut
     */
    public function setRut(string $rut)
    {
        $this->rut = $rut;
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getMothersLastName()
    {
        return $this->mothersLastName;
    }

    /**
     * @param string $mothersLastName
     */
    public function setMothersLastName(string $mothersLastName)
    {
        $this->mothersLastName = $mothersLastName;
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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
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

    public function getFullName()
    {

        return sprintf("%s %s %s",
            $this->name,
            $this->lastName,
            $this->mothersLastName);
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
     * @return Customers
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
