<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
{
    const ESTADO_BUENO = 'estado.bueno';
    const ESTADO_MALO_DETALLES = 'estado.malo.detalle';
    const ESTADO_NO_COMERCIALIZADO = 'estado.comercializado';

    /**
     * @ORM\Id @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=30, nullable=true)
     */
    protected $nombreProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="string", length=30, nullable=true)
     */
    protected $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_neto", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $precioNeto;

    /**
     * @var Bodega
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bodega", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $bodega;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=30, nullable=true)
     */
    protected $estado = self::ESTADO_BUENO;

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
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * @param string $nombreProducto
     */
    public function setNombreProducto(string $nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
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
     * @return string
     */
    public function getPrecioNeto()
    {
        return $this->precioNeto;
    }

    /**
     * @param string $precioNeto
     */
    public function setPrecioNeto(string $precioNeto)
    {
        $this->precioNeto = $precioNeto;
    }

    /**
     * @return Bodega
     */
    public function getBodega()
    {
        return $this->bodega;
    }

    /**
     * @param Bodega $bodega
     */
    public function setBodega(Bodega $bodega)
    {
        $this->bodega = $bodega;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }

    public function __toString()
    {
        return $this->nombreProducto;
    }
}

