<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimientos
 *
 * @ORM\Table(name="movimientos")
 * @ORM\Entity
 */
class Movimientos
{

    const ESTADO_CARGO = 1;
    const ESTADO_ABONO = 2;

    const PAGO_EFECTIVO = 'pago.efectivo';
    const PAGO_DEBITO = 'pago.debito';
    const PAGO_CREDITO = 'pago.credito';

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
     * @ORM\Column(name="numero_documento", type="string", length=30, nullable=true)
     */
    protected $numeroDocumento;

    /**
     * @var Usuarios
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Clientes", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_transaccion", type="string", length=30, nullable=true)
     */
    protected $detalleTransaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $monto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_movimiento", type="date", nullable=true)
     */
    protected $fechaMovimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="forma_pago", type="date", nullable=true)
     */
    protected $formaPago;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_movimiento", type="integer", nullable=true)
     */
    protected $tipoMovimiento;

    /**
     * @var Cobradores
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Cobradores", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $cobrador;

    /**
     * @var Vendedores
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Vendedores", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $vendedor;

    /**
     * @var Detalle
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Detalle", inversedBy="")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $glosa;

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
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @param string $numeroDocumento
     */
    public function setNumeroDocumento(string $numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    /**
     * @return Usuarios
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Usuarios $cliente
     */
    public function setCliente(Usuarios $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return string
     */
    public function getDetalleTransaccion()
    {
        return $this->detalleTransaccion;
    }

    /**
     * @param string $detalleTransaccion
     */
    public function setDetalleTransaccion(string $detalleTransaccion)
    {
        $this->detalleTransaccion = $detalleTransaccion;
    }

    /**
     * @return string
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param string $monto
     */
    public function setMonto(string $monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return \DateTime
     */
    public function getFechaMovimiento()
    {
        return $this->fechaMovimiento;
    }

    /**
     * @param \DateTime $fechaMovimiento
     */
    public function setFechaMovimiento(\DateTime $fechaMovimiento)
    {
        $this->fechaMovimiento = $fechaMovimiento;
    }

    /**
     * @return \DateTime
     */
    public function getFormaPago()
    {
        return $this->formaPago;
    }

    /**
     * @param \DateTime $formaPago
     */
    public function setFormaPago(\DateTime $formaPago)
    {
        $this->formaPago = $formaPago;
    }

    /**
     * @return string
     */
    public function getTipoMovimiento()
    {
        return $this->tipoMovimiento;
    }

    /**
     * @param string $tipoMovimiento
     */
    public function setTipoMovimiento(string $tipoMovimiento)
    {
        $this->tipoMovimiento = $tipoMovimiento;
    }

    /**
     * @return Cobradores
     */
    public function getCobrador()
    {
        return $this->cobrador;
    }

    /**
     * @param Cobradores $cobrador
     */
    public function setCobrador(Cobradores $cobrador)
    {
        $this->cobrador = $cobrador;
    }

    /**
     * @return Vendedores
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * @param Vendedores $vendedor
     */
    public function setVendedor(Vendedores $vendedor)
    {
        $this->vendedor = $vendedor;
    }

    /**
     * @return Detalle
     */
    public function getGlosa()
    {
        return $this->glosa;
    }

    /**
     * @param Detalle $glosa
     */
    public function setGlosa(Detalle $glosa)
    {
        $this->glosa = $glosa;
    }
}

