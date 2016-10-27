<?php


namespace App\Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="evento")
 * @ORM\Entity
 */
class Evento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=50, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=50, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inicio", type="string", nullable=false)
     */
    private $inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fim", type="datetime", nullable=true)
     */
    private $fim;

       /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50, nullable=false)
     */
    private $nome;

      /**
     * @var string
     *
     * @ORM\Column(name="idade", type="string", length=50, nullable=false)
     */
    private $nascimento;


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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Evento
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Evento
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set inicio
     *
     * @param string $inicio
     *
     * @return Evento
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get inicio
     *
     * @return string
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set fim
     *
     * @param \DateTime $fim
     *
     * @return Evento
     */
    public function setFim($fim)
    {
        $this->fim = $fim;

        return $this;
    }

    /**
     * Get fim
     *
     * @return \DateTime
     */
    public function getFim()
    {
        return $this->fim;
    }


      /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Evento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }


   /**
     * Set idade
     *
     * @param string $idade
     *
     * @return Evento
     */
    public function setIdade($idade)
    {
        $this->nascimento = $idade;

        return $this;
    }

    /**
     * Get idade
     *
     * @return string
     */
    public function getIdade()
    {
        return $this->nascimento;
    }



     public function __toArray()
    {
        $data = [];
        foreach ($this as $k=>$v)
        $data[$k] = $v;

        return $data;
    }
}
