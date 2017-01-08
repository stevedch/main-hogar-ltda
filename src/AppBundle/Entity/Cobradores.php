<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cobradores
 *
 * @ORM\Table(name="cobradores")
 * @ORM\Entity
 */
class Cobradores
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
     * @ORM\Column(name="porcentaje_comision", type="string", length=45, nullable=true)
     */
    protected $porcentajeComision;

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
    public function getPorcentajeComision()
    {
        return $this->porcentajeComision;
    }

    /**
     * @param string $porcentajeComision
     */
    public function setPorcentajeComision(string $porcentajeComision)
    {
        $this->porcentajeComision = $porcentajeComision;
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


