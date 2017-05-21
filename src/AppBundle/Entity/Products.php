<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductsRepository")
 */
class Products
{
    const STATUS_GOOD = 'status.good';
    const STATUS_BAD = 'status.bad';

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
     * @ORM\ManyToOne(targetEntity="Cellar", inversedBy="product", cascade={"persist", "remove"})
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
     * @var Details
     * @ORM\OneToMany(targetEntity="Details", mappedBy="product", cascade={"persist", "remove"})
     */
    protected $detail;

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

    public function getFullData()
    {
        return sprintf('(%s) %s',
            $this->id,
            $this->name);
    }

    public function getFullCellar()
    {
        return sprintf('%s / %s / %s',
            $this->cellar->getId(),
            $this->cellar->getName(),
            $this->cellar->getAddress());
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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detail = new ArrayCollection();
    }

    /**
     * Add detail
     *
     * @param \AppBundle\Entity\Details $detail
     *
     * @return Products
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
