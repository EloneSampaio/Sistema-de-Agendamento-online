<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vagas
 *
 * @ORM\Table(name="vagas")
 * @ORM\Entity
 */
class Vagas
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
     * @var integer
     *
     * @ORM\Column(name="disponivel", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $disponivel;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $data;

    /**
     * @var integer
     *
     * @ORM\Column(name="ofertada", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $ofertada;


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
     * Set disponivel
     *
     * @param integer $disponivel
     *
     * @return Vagas
     */
    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;

        return $this;
    }

    /**
     * Get disponivel
     *
     * @return integer
     */
    public function getDisponivel()
    {
        return $this->disponivel;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return Vagas
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set ofertada
     *
     * @param integer $ofertada
     *
     * @return Vagas
     */
    public function setOfertada($ofertada)
    {
        $this->ofertada = $ofertada;

        return $this;
    }

    /**
     * Get ofertada
     *
     * @return integer
     */
    public function getOfertada()
    {
        return $this->ofertada;
    }
}

