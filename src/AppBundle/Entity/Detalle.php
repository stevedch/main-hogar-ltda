<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detalle
 *
 * @ORM\Table(name="detalle")
 * @ORM\Entity
 */
class Detalle
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
     * @ORM\Column(name="numero", type="string", length=45, nullable=true)
     */
    protected $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_apertura_cuenta", type="date", nullable=true)
     */
    protected $fechaEmision;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="string", length=30, nullable=true)
     */
    protected $cantidad;

    /**
     * @var Producto
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Producto", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $producto;

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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return \DateTime
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * @param \DateTime $fechaEmision
     */
    public function setFechaEmision(\DateTime $fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;
    }

    /**
     * @return string
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param string $cantidad
     */
    public function setCantidad(string $cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return Producto
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param Producto $producto
     */
    public function setProducto(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function __toString()
    {
        return '';
    }
}

