<?php

namespace AppBundle\Entity;

use Assetic\Exception\Exception;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 */
class Usuarios implements UserInterface, \Serializable
{

    const  ROL_ESTANDAR = 'ROLE_USER';

    const ESTADO_ACTIVO = 'estado.activo';
    const ESTADO_INACTIVO = 'estado.inactivo';

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
     * @ORM\Column(name="nombre_usuario", type="string", length=45, nullable=true)
     */
    protected $nombreUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="rut", type="integer", nullable=true)
     */
    protected $rut;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_parteno", type="string", length=45, nullable=true)
     */
    protected $apellidoParteno;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_marteno", type="string", length=45, nullable=true)
     */
    protected $apellidoMarteno;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $salto;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasenia", type="string", length=255)
     */
    protected $contrasenia;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=30, nullable=true)
     */
    protected $estado = self::ESTADO_ACTIVO;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="array")
     */
    protected $roles = self::ROL_ESTANDAR;


    public function __construct()
    {
        $this->salto = md5(uniqid(null, true));
    }

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
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param string $nombreUsuario
     */
    public function setNombreUsuario(string $nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * @return int
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * @param int $rut
     */
    public function setRut(int $rut)
    {
        $this->rut = $rut;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidoParteno()
    {
        return $this->apellidoParteno;
    }

    /**
     * @param string $apellidoParteno
     */
    public function setApellidoParteno(string $apellidoParteno)
    {
        $this->apellidoParteno = $apellidoParteno;
    }

    /**
     * @return string
     */
    public function getApellidoMarteno()
    {
        return $this->apellidoMarteno;
    }

    /**
     * @param string $apellidoMarteno
     */
    public function setApellidoMarteno(string $apellidoMarteno)
    {
        $this->apellidoMarteno = $apellidoMarteno;
    }

    /**
     * @return string
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * @param string $contrasenia
     */
    public function setContrasenia(string $contrasenia)
    {
        $this->contrasenia = $contrasenia;
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
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->nombreUsuario;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salto;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->contrasenia;
    }

    /**
     * @return string
     */
    public function getRoles()
    {
        return [
            'ROLE_SUPER_ADMIN',
            'ROLE_ADMIN'
        ];
    }

    /**
     * @param Array $roles
     * @return string
     */
    public function setRoles(array $roles)
    {
        $this->roles = array();

        foreach ($roles as $role) {
            $this->addRole($role);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    public function eraseCredentials()
    {
    }

    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user)
    {
        return $this->id === $user->getId();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            ) = unserialize($serialized);
    }

    public function __toString()
    {
        return $this->roles;
    }
}

