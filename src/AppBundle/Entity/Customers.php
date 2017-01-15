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
    public function getHomeAddress()
    {
        return $this->homeAddress;
    }

    /**
     * @param string $homeAddress
     */
    public function setHomeAddress(string $homeAddress)
    {
        $this->homeAddress = $homeAddress;
    }

    /**
     * @return string
     */
    public function getWorkAddress()
    {
        return $this->workAddress;
    }

    /**
     * @param string $workAddress
     */
    public function setWorkAddress(string $workAddress)
    {
        $this->workAddress = $workAddress;
    }

    /**
     * @return string
     */
    public function getFixedNetworkPhone()
    {
        return $this->fixedNetworkPhone;
    }

    /**
     * @param string $fixedNetworkPhone
     */
    public function setFixedNetworkPhone(string $fixedNetworkPhone)
    {
        $this->fixedNetworkPhone = $fixedNetworkPhone;
    }

    /**
     * @return string
     */
    public function getCellPhone()
    {
        return $this->cellPhone;
    }

    /**
     * @param string $cellPhone
     */
    public function setCellPhone(string $cellPhone)
    {
        $this->cellPhone = $cellPhone;
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
     * @return \DateTime
     */
    public function getAccountOpeningDate()
    {
        return $this->accountOpeningDate;
    }

    /**
     * @param \DateTime $accountOpeningDate
     */
    public function setAccountOpeningDate(\DateTime $accountOpeningDate)
    {
        $this->accountOpeningDate = $accountOpeningDate;
    }

    /**
     * @return int
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param int $accountNumber
     */
    public function setAccountNumber(int $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return string
     */
    public function getAuthorizedCredit()
    {
        return $this->authorizedCredit;
    }

    /**
     * @param string $authorizedCredit
     */
    public function setAuthorizedCredit(string $authorizedCredit)
    {
        $this->authorizedCredit = $authorizedCredit;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDateAgreed()
    {
        return $this->paymentDateAgreed;
    }

    /**
     * @param \DateTime $paymentDateAgreed
     */
    public function setPaymentDateAgreed(\DateTime $paymentDateAgreed)
    {
        $this->paymentDateAgreed = $paymentDateAgreed;
    }

    /**
     * @return string
     */
    public function getTotalCharge()
    {
        return $this->totalCharge;
    }

    /**
     * @param string $totalCharge
     */
    public function setTotalCharge(string $totalCharge)
    {
        $this->totalCharge = $totalCharge;
    }

    /**
     * @return string
     */
    public function getTotalDeposit()
    {
        return $this->totalDeposit;
    }

    /**
     * @param string $totalDeposit
     */
    public function setTotalDeposit(string $totalDeposit)
    {
        $this->totalDeposit = $totalDeposit;
    }

    /**
     * @return int
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * @param int $rut
     */
    public function setRut(int $rut)
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

    public function getFullName()
    {
        return $this->getName() . ' ' . $this->getLastName() . ' ' . $this->getMothersLastName();
    }
}

