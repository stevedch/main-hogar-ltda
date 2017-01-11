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
     * @var integer
     *
     * @ORM\Column(name="rut", type="integer", nullable=true)
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

}

