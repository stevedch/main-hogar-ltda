<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vendedores
 *
 * @ORM\Table(name="vendedores")
 * @ORM\Entity
 */
class Vendedores
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
    protected $usuarios;

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
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * @param Usuarios $usuarios
     */
    public function setUsuarios(Usuarios $usuarios)
    {
        $this->usuarios = $usuarios;
    }

    public function __toString()
    {
        return '';
    }
}


