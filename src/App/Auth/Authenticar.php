<?php

namespace App\Auth;
use App\Action\Action;
use App\Auth\Bcrypt;


class Authenticar extends  Action{


    

   

    

    public function autenticar($usuario,$senha){
        
       $hash=Bcrypt::getHash('md5', $senha, HASH_KEY);
       $data= $this->usuarioLogin->Autenticar($usuario,$hash);
       
 
       if($data){
       	 $session = new \RKA\Session();
         $session->usuario=$data['id'];
       	 	
       	    return true;
       }

       return false;
     
     
    
      
    }


}