<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity
 */
class Clientes
{
    const ESTADO_ACTIVO = 'estado.activo';
    const ESTADO_SUSPENDIDO = 'estado.suspendido';
    const ESTADO_ELIMINADO = 'estado.eliminado';

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
     * @ORM\Column(name="domicilio_particular", type="string", length=30, nullable=true)
     */
    protected $domicilioParticular;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio_laboral", type="string", length=30, nullable=true)
     */
    protected $domicilioLaboral;

    /**
     * @var string
     *
     * @ORM\Column(name="fono_red_fija", type="decimal", precision=20, scale=0, nullable=true)
     */
    protected $fonoRedFija;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="decimal", precision=20, scale=0, nullable=true)
     */
    protected $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=true)
     */
    protected $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_apertura_cuenta", type="date", nullable=true)
     */
    protected $fechaAperturaCuenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_cuenta", type="integer", nullable=true)
     */
    protected $numeroCuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="credito_autorizado", type="string", length=30, nullable=true)
     */
    protected $creditoAutorizado;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pago_pactada", type="date", nullable=true)
     */
    protected $fechaPagoPactada;

    /**
     * @var string
     *
     * @ORM\Column(name="total_cargos", type="string", length=30, nullable=true)
     */
    protected $totalCargos;

    /**
     * @var string
     *
     * @ORM\Column(name="total_abonos", type="string", length=30, nullable=true)
     */
    protected $totalAbonos;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=30, nullable=true)
     */
    protected $estado = self::ESTADO_ACTIVO;

    /**
     * @var Usuarios
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Usuarios")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $usuario;

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
    public function getDomicilioParticular()
    {
        return $this->domicilioParticular;
    }

    /**
     * @param string $domicilioParticular
     */
    public function setDomicilioParticular(string $domicilioParticular)
    {
        $this->domicilioParticular = $domicilioParticular;
    }

    /**
     * @return string
     */
    public function getDomicilioLaboral()
    {
        return $this->domicilioLaboral;
    }

    /**
     * @param string $domicilioLaboral
     */
    public function setDomicilioLaboral(string $domicilioLaboral)
    {
        $this->domicilioLaboral = $domicilioLaboral;
    }

    /**
     * @return string
     */
    public function getFonoRedFija()
    {
        return $this->fonoRedFija;
    }

    /**
     * @param string $fonoRedFija
     */
    public function setFonoRedFija(string $fonoRedFija)
    {
        $this->fonoRedFija = $fonoRedFija;
    }

    /**
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param string $celular
     */
    public function setCelular(string $celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getFechaAperturaCuenta()
    {
        return $this->fechaAperturaCuenta;
    }

    /**
     * @param \DateTime $fechaAperturaCuenta
     */
    public function setFechaAperturaCuenta(\DateTime $fechaAperturaCuenta)
    {
        $this->fechaAperturaCuenta = $fechaAperturaCuenta;
    }

    /**
     * @return int
     */
    public function getNumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    /**
     * @param int $numeroCuenta
     */
    public function setNumeroCuenta(int $numeroCuenta)
    {
        $this->numeroCuenta = $numeroCuenta;
    }

    /**
     * @return string
     */
    public function getCreditoAutorizado()
    {
        return $this->creditoAutorizado;
    }

    /**
     * @param string $creditoAutorizado
     */
    public function setCreditoAutorizado(string $creditoAutorizado)
    {
        $this->creditoAutorizado = $creditoAutorizado;
    }

    /**
     * @return \DateTime
     */
    public function getFechaPagoPactada()
    {
        return $this->fechaPagoPactada;
    }

    /**
     * @param \DateTime $fechaPagoPactada
     */
    public function setFechaPagoPactada(\DateTime $fechaPagoPactada)
    {
        $this->fechaPagoPactada = $fechaPagoPactada;
    }

    /**
     * @return string
     */
    public function getTotalCargos()
    {
        return $this->totalCargos;
    }

    /**
     * @param string $totalCargos
     */
    public function setTotalCargos(string $totalCargos)
    {
        $this->totalCargos = $totalCargos;
    }

    /**
     * @return string
     */
    public function getTotalAbonos()
    {
        return $this->totalAbonos;
    }

    /**
     * @param string $totalAbonos
     */
    public function setTotalAbonos(string $totalAbonos)
    {
        $this->totalAbonos = $totalAbonos;
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

    /**
     * @return Usuarios
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuarios $usuario
     */
    public function setUsuario(Usuarios $usuario)
    {
        $this->usuario = $usuario;
    }

    public function __toString()
    {
        return '';
    }
}

