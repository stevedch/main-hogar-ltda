<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Details
 *
 * @ORM\Table(name="details")
 * @ORM\Entity()
 */
class Details
{
    CONST DETAILS_SALE = 'detail.sale';
    CONST DETAILS_PURCHASE = 'detail.purchase';

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
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     */
    protected $number;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfIssue", type="date", nullable=true)
     */
    protected $dateOfIssue;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="string", length=30, nullable=true)
     */
    protected $quantity;

    /**
     * @var string
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    protected $type = self::DETAILS_PURCHASE;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $metadata = array();



    /**
     * Details constructor.
     */
    public function __construct()
    {
        $this->dateOfIssue = new \DateTime('now');
    }

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }


    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfIssue()
    {
        return $this->dateOfIssue;
    }

    /**
     * @param \DateTime $dateOfIssue
     */
    public function setDateOfIssue(\DateTime $dateOfIssue)
    {
        $this->dateOfIssue = $dateOfIssue;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param $metadata
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addMetadata($key, $value)
    {
        $this->metadata[$key] = $value;

        return $this;
    }
}

