<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User;

/**
 * Customers
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity
 */
class Customers
{
    const STATUS_ACTIVE = 'status.active';
    const STATUS_SUSPENDED = 'status.suspended';
    const STATUS_REMOVED = 'status.removed';

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
     * @ORM\Column(name="home_address", type="string", length=30, nullable=true)
     */
    protected $homeAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="work_address", type="string", length=30, nullable=true)
     */
    protected $workAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_network_phone", type="string", nullable=false)
     */
    protected $fixedNetworkPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="cell_phone", type="string", nullable=false)
     */
    protected $cellPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=true)
     */
    protected $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="account_opening_date", type="date", nullable=true)
     */
    protected $accountOpeningDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="account_number", type="integer", nullable=true)
     */
    protected $accountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="authorized_credit", type="string", length=30, nullable=true)
     */
    protected $authorizedCredit;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="payment_date_agreed", type="date", nullable=true)
     */
    protected $paymentDateAgreed;

    /**
     * @var string
     *
     * @ORM\Column(name="total_charge", type="string", length=30, nullable=true)
     */
    protected $totalCharge;

    /**
     * @var string
     *
     * @ORM\Column(name="total_deposit", type="string", length=30, nullable=true)
     */
    protected $totalDeposit;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=30, nullable=true)
     */
    protected $status = self::STATUS_ACTIVE;

}

