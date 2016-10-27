<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Auth\Bcrypt;

/**
 * User
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class User 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $senha;



 public function __construct(Array $data = [])
    {
        if (!empty($data['usuario']))
           $this->usuario = $data['usuario'];

        if (!empty($data['senha'])) {
           
            $this->senha = Bcrypt::getHash('md5', $data['senha'], HASH_KEY);
        }
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return User
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return User
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    public function __toArray()
    {
        $data = [];
        foreach ($this as $k=>$v)
        $data[$k] = $v;

        return $data;
    }
}

