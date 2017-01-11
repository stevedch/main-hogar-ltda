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
     * @var string
     *
     * @ORM\Column(name="document_pending_payment", type="string", length=30, nullable=true)
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Customers")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $customer;

    /**
     * @var Sellers
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Sellers")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $seller;

}

