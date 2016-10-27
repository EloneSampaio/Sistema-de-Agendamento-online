<?php

namespace App\Action\Admin;
use App\Action\Action as Action;

final Class  AgendarAction extends Action{

   


	public function index ( $request, $response){

		$vars['pagina']="Pagina de Administracao";
     return   $this->view->render($response,"admin/home.phtml",$vars);

	}

	
}