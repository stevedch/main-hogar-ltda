<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movements
 *
 * @ORM\Table(name="movements")
 * @ORM\Entity
 */
class Movements
{

    const STATUS_CHARGE = 1;
    const STATUS_DEPOSIT = 2;

    const CASH_PAYMENT = 'cash.payment';
    const PAYMENT_DEBIT = 'payment.debit';
    const PAYMENT_CREDIT = 'payment.credit';

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
     * @ORM\Column(name="document_number", type="string", length=30, nullable=true)
     */
    protected $documentNumber;

    /**
     * @var Customers
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Customers", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_detail", type="string", length=30, nullable=true)
     */
    protected $transactionDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="rode", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $rode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_movement", type="date", nullable=true)
     */
    protected $dateMovement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paid_form", type="date", nullable=true)
     */
    protected $paidForm;

    /**
     * @var string
     *
     * @ORM\Column(name="movement_type", type="integer", nullable=true)
     */
    protected $movementType;

    /**
     * @var Collectors
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Collectors", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $cobrador;

    /**
     * @var Sellers
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Sellers", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $seller;

    /**
     * @var Details
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Details", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $gloss;


}

