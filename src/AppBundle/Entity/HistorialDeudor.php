<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistorialDeudor
 *
 * @ORM\Table(name="historial_deudor")
 * @ORM\Entity
 */
class HistorialDeudor
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
     * @ORM\Column(name="documento_pendiente_pago", type="string", length=30, nullable=true)
     */
    protected $documentoPendientePago;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_total_deuda", type="decimal", precision=30, scale=0, nullable=true)
     */
    protected $montoTotalDeuda;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultimo_pago", type="date", nullable=true)
     */
    protected $fechaUltimoPago;

    /**
     * @var Clientes
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Clientes")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $cliente;

    /**
     * @var Vendedores
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Vendedores")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $vendedor;

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
    public function getDocumentoPendientePago()
    {
        return $this->documentoPendientePago;
    }

    /**
     * @param string $documentoPendientePago
     */
    public function setDocumentoPendientePago(string $documentoPendientePago)
    {
        $this->documentoPendientePago = $documentoPendientePago;
    }

    /**
     * @return string
     */
    public function getMontoTotalDeuda()
    {
        return $this->montoTotalDeuda;
    }

    /**
     * @param string $montoTotalDeuda
     */
    public function setMontoTotalDeuda(string $montoTotalDeuda)
    {
        $this->montoTotalDeuda = $montoTotalDeuda;
    }

    /**
     * @return \DateTime
     */
    public function getFechaUltimoPago()
    {
        return $this->fechaUltimoPago;
    }

    /**
     * @param \DateTime $fechaUltimoPago
     */
    public function setFechaUltimoPago(\DateTime $fechaUltimoPago)
    {
        $this->fechaUltimoPago = $fechaUltimoPago;
    }

    /**
     * @return Clientes
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Clientes $cliente
     */
    public function setCliente(Clientes $cliente)
    {
        $this->cliente = $cliente;
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
}

