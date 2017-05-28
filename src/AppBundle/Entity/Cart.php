<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity()
 */
class Cart
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
     * @ORM\Column(name="idProduct", type="string", length=255, nullable=true)
     */
    protected $idProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=254, nullable=true)
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * @param string $idProduct
     */
    public function setIdProduct(string $idProduct)
    {
        $this->idProduct = $idProduct;
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
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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
}
