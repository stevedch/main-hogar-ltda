<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movements
 *
 * @ORM\Table(name="movements")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MovementsRepository")
 */
class Movements
{

    const STATUS_CHARGE = 1;
    const STATUS_DEPOSIT = 2;

    const CASH_PAYMENT = 'cash.payment';
    const PAYMENT_DEBIT = 'payment.debit';
    const PAYMENT_CREDIT = 'payment.credit';
    const PAYMENT_CHECK = 'payment.check';

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
    protected $documentNumber;

    /**
     * @ORM\Column(name="rode", type="integer", nullable=true)
     */
    protected $rode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_movement", type="date", nullable=true)
     */
    protected $dateMovement;

    /**
     * @var string
     *
     * @ORM\Column(name="paid_form", type="string", nullable=true)
     */
    protected $paidForm;

    /**
     * @var int
     *
     * @ORM\Column(name="movement_type", type="integer", nullable=true)
     */
    protected $movementType;

    /**
     * @var Collectors
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Collectors", inversedBy="", cascade={"persist", "remove" })
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $collector;

    /**
     * @var Sellers
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sellers", inversedBy="", cascade={"persist", "remove" })
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $seller;


    /**
     * @var Customers
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customers", inversedBy="", cascade={"persist", "remove" })
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $client;

    /**
     * Movements constructor.
     */
    public function __construct()
    {
        $this->dateMovement = new \DateTime('now');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Details
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @param Details $documentNumber
     */
    public function setDocumentNumber(Details $documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * @return mixed
     */
    public function getRode()
    {
        return $this->rode;
    }

    /**
     * @param mixed $rode
     */
    public function setRode($rode)
    {
        $this->rode = $rode;
    }

    /**
     * @return \DateTime
     */
    public function getDateMovement()
    {
        return $this->dateMovement;
    }

    /**
     * @param \DateTime $dateMovement
     */
    public function setDateMovement(\DateTime $dateMovement)
    {
        $this->dateMovement = $dateMovement;
    }

    /**
     * @return string
     */
    public function getPaidForm()
    {
        return $this->paidForm;
    }

    /**
     * @param string $paidForm
     */
    public function setPaidForm(string $paidForm)
    {
        $this->paidForm = $paidForm;
    }

    /**
     * @return string
     */
    public function getMovementType()
    {
        return $this->movementType;
    }

    /**
     * @param int $movementType
     */
    public function setMovementType(int $movementType)
    {
        $this->movementType = $movementType;
    }

    /**
     * @return Collectors
     */
    public function getCollector()
    {
        return $this->collector;
    }

    /**
     * @param Collectors $collector
     */
    public function setCollector(Collectors $collector)
    {
        $this->collector = $collector;
    }

    /**
     * @return Sellers
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @param Sellers $seller
     */
    public function setSeller(Sellers $seller)
    {
        $this->seller = $seller;
    }

    /**
     * @return Customers
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Customers $client
     */
    public function setClient(Customers $client)
    {
        $this->client = $client;
    }
}

