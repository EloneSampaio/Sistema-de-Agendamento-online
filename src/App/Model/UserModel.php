<?php

namespace App\Model;

use App\Entities\User as Usuario;
use Doctrine\ORM\EntityManager;
use App\AbstractModel;

class UserModel  extends AbstractModel
{
   


    
   
    public function create(array $data)
    {
    	
    	
        $user = new Usuario($data);

        $this->entityManager->persist($user);
        return $this->entityManager->flush();
    }

  

    function Autenticar($nome,$senha,$array = true) {

        $usuario= $this->entityManager->getRepository('App\Entities\User')->findOneBy(Array("usuario"=>$nome,"senha"=>$senha));
      
        if ($array and $usuario)
            $usuario = $usuario->__toArray();

        return $usuario;
    }
        
    

}