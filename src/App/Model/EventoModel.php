<?php

namespace App\Model;
use  App\Entities\Evento;

use App\Entities\User as Usuario;
use Doctrine\ORM\EntityManager;
use App\AbstractModel;

class EventoModel  extends AbstractModel
{
   


    
   
    public function create($data,$nome,$nascimento)
    {
    	
    	
        $ev = new Evento();
        $ev->setInicio($data->format('Y-m-d H:i:s'));
        $ev->setNome($nome);
        $ev->setIdade($nascimento);
  
        $this->entityManager->persist($ev);
         $this->entityManager->flush();
         return true;
    }

  

    function getAll($array=true) {

        $agenda= $this->entityManager->getRepository('App\Entities\Evento')->findBy(array(), array('inicio' => 'ASC'));
      
        return $agenda;

    }

     function getByData($data) {

        $vaga= $this->entityManager->getRepository('App\Entities\Evento')->findBy(Array("inicio"=>$data->format('Y-m-d H:i:s')));

    
        return $vaga;

    }
        
    

}