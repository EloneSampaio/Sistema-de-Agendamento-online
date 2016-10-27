<?php

namespace App\Model;
use  App\Entities\Vagas;
use Doctrine\ORM\EntityManager;
use App\AbstractModel;

class VagaModel  extends AbstractModel
{
   

  public function create( $data,$oferta)
    {
        
        
        $ev = new Vagas();
        $ev->setData($data->format('Y-m-d H:i:s'));
        $ev->setOfertada($oferta);
        $ev->setDisponivel(0);
  
        $this->entityManager->persist($ev);
         $this->entityManager->flush();
         return true;
    }

  

    function getByData($data) {

        $vaga= $this->entityManager->getRepository('App\Entities\Vagas')->findOneBy(Array("data"=>$data->format('Y-m-d H:i:s')));

    
        return $vaga;

    }


    function getAll($array=true) {

        $vaga= $this->entityManager->getRepository('App\Entities\Vagas')->findBy(array(), array('id' => 'ASC'));
      
        return $vaga;

    }
    

}