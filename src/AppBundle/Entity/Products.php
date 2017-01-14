<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Products
{
    const STATUS_GOOD = 'status.good';
    const STATUS_BAD = 'status.bad';
    const STATUS_NOT_MARKETED = 'status.not.marketed';

    /**
     * @ORM\Id @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    protected $name;

    /**
     * @var Int
     *
     * @ORM\Column(name="quantity", type="integer", length=30, nullable=true)
     */
    protected $quantity;

    /**
     * @ORM\Column(name="price", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $price;

    /**
     * @ORM\Column(name="price_net", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $priceNet;

    /**
     * @var Cellar
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cellar", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $cellar;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=30, nullable=true)
     */
    protected $status = self::STATUS_GOOD;

    /**
     * @var Supplier
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Supplier", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $supplier;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @return Int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param Int $quantity
     */
    public function setQuantity(Int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPriceNet()
    {
        return $this->priceNet;
    }

    /**
     * @param mixed $priceNet
     */
    public function setPriceNet($priceNet)
    {
        $this->priceNet = $priceNet;
    }

    /**
     * @return Cellar
     */
    public function getCellar()
    {
        return $this->cellar;
    }

    /**
     * @param Cellar $cellar
     */
    public function setCellar(Cellar $cellar)
    {
        $this->cellar = $cellar;
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
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return Supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * @param Supplier $supplier
     */
    public function setSupplier(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }
}

