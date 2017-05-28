<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users extends BaseUser
{

    const STATUS_ACTIVE = 'status.active';
    const STATUS_INACTIVE = 'status.inactive';

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
     * @ORM\Column(name="status", type="string", length=30, nullable=true)
     */
    protected $status = self::STATUS_ACTIVE;

    /**
     * @var Details
     * @ORM\OneToMany(targetEntity="Details", mappedBy="user", cascade={"persist", "remove"})
     */
    protected $detail;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return Details
     */
    public function getDetail()
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

    public function getFullData()
    {
        return sprintf("(%s) %s %s %s", $this->rut,
            $this->name,
            $this->lastName,
            $this->mothersLastName);
    }

    public function getUserData()
    {

    }

    /**
     * Add detail
     *
     * @param \AppBundle\Entity\Details $detail
     *
     * @return Users
     */
    public function addDetail(Details $detail)
    {
        $this->detail[] = $detail;

        return $this;
    }

    /**
     * Remove detail
     *
     * @param \AppBundle\Entity\Details $detail
     */
    public function removeDetail(Details $detail)
    {
        $this->detail->removeElement($detail);
    }
}
