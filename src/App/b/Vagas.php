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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="disponivel", type="integer", nullable=true)
     */
    private $disponivel = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=50, nullable=false)
     */
    private $data;

    /**
     * @var integer
     *
     * @ORM\Column(name="ofertada", type="integer", nullable=false)
     */
    private $ofertada = '20';



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
     * Get ofertada
     *
     * @return string
     */
    public function getOfertada()
    {
        return $this->ofertada;
    }

    /**
     * Set ofertada
     *
     * @param string $ofertada
     *
     * @return Vagas
     */
    public function setOfertada($ofertada)
    {
        $this->ofertada = $ofertada;

        return $this;
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
     * Get disponivel
     *
     * @return string
     */
    public function getDisponivel()
    {
        return $this->disponivel;
    }

    /**
     * Set disponivel
     *
     * @param string $disponivel
     *
     * @return Vagas
     */
    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;

        return $this;
    }
}

