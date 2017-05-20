<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Record
 *
 * @ORM\Table(name="record")
 * @ORM\Entity
 */
class Record
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
     * @var Details
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Details", inversedBy="", cascade={"persist", "remove" })
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $documentPendingPayment;

    /**
     * @var string
     *
     * @ORM\Column(name="amount_total_debt", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $amountTotalDebt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_payment_date", type="date", nullable=true)
     */
    protected $lastPaymentDate;

    /**
     * @var Customers
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customers", inversedBy="", cascade={"persist", "remove" })
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $customer;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->lastPaymentDate = new \DateTime('now');
    }

    /**
     * @return Details
     */
    public function getDocumentPendingPayment()
    {
        return $this->documentPendingPayment;
    }

    /**
     * @param Details $documentPendingPayment
     */
    public function setDocumentPendingPayment(Details $documentPendingPayment)
    {
        $this->documentPendingPayment = $documentPendingPayment;
    }


    /**
     * @return string
     */
    public function getAmountTotalDebt()
    {
        return $this->amountTotalDebt;
    }

    /**
     * @param string $amountTotalDebt
     */
    public function setAmountTotalDebt(string $amountTotalDebt)
    {
        $this->amountTotalDebt = $amountTotalDebt;
    }

    /**
     * @return \DateTime
     */
    public function getLastPaymentDate()
    {
        return $this->lastPaymentDate;
    }

    /**
     * @param \DateTime $lastPaymentDate
     */
    public function setLastPaymentDate(\DateTime $lastPaymentDate)
    {
        $this->lastPaymentDate = $lastPaymentDate;
    }

    /**
     * @return Customers
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customers $customer
     */
    public function setCustomer(Customers $customer)
    {
        $this->customer = $customer;
    }
}

