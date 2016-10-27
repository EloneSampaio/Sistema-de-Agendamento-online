<?php

namespace App\Action;
use App\Model\UserModel;
use \Slim\Views\PhpRenderer;
use \DateTime;

final Class  AgendarAction extends Action{

  
  
  
	public function index ( $request, $response){

		//$this->usuario->create(array("usuario"=>"sam","senha"=>123));
		$vars['pagina']="Agendar";

		 
     return   $this->view->render($response,"template.phtml",$vars);

	}


	public function agenda ( $request, $response){

		
		 
     return   $this->view->render($response,"agenda/novo.phtml");

	}

	public function listaVaga($request,$response){

       $data= $this->vaga->getAll();

       $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
       $jsonContent = $serializer->serialize($data, 'json');
       echo $jsonContent; // or return it in a Response
		

	}

	public function listaAgenda($request,$response){

       $valores=$request->getParsedBodyParam("data", $default = null);
        
   	  $date = new \DateTime($valores);

       $data= $this->evento->getByData($date);
       
       if($data!=null){
       $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
       $jsonContent = $serializer->serialize($data, 'json');
       echo $jsonContent; // or return it in a Response
		}else{
			echo json_encode("error");
		}

		

	}

	public function postAgenda($request,$response){
     $data=$request->getParsedBodyParam("data", $default = null);
     $nome=$request->getParsedBodyParam("nome", $default = null);
     $nascimento=$request->getParsedBodyParam("nascimento", $default = null);


   	  $date = new \DateTime($data);
   
       $data= $this->evento->create($date,$nome,$nascimento);
        
       $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
       $jsonContent = $serializer->serialize($data, 'json');
       echo $jsonContent; // or return it in a Response
		

	}



	public function buscaVaga($request,$response){
     
      $valores=$request->getParsedBodyParam("data", $default = null);


   	  $date = new \DateTime($valores);
       $data= $this->vaga->getByData($date);
       

       $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
       $jsonContent = $serializer->serialize($data, 'json');
       echo $jsonContent; // or return it in a Response
		

	}


	public function reagendar ( $request, $response){
		echo  json_encode(array("ok"));

	}

	public function cancelar ( $request, $response){
		$vars['pagina']="cancelar";
     return   $this->view->render($response,"template.phtml",$vars);

	}


	public function addVaga($request, $response){

           $date=$request->getParsedBodyParam("data", $default = null);
           $oferta=$request->getParsedBodyParam("oferta", $default = null);
    $date = new \DateTime($date);
        $data= $this->vaga->create($date,$oferta);

       $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
       $jsonContent = $serializer->serialize($data, 'json');
       echo $jsonContent; // or return it in a Response
	}
}