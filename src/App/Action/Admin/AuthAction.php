<?php
    
    namespace App\Action\Admin;
    use App\Auth\Authenticar;
    use App\Action\Action;

	

	final Class  AuthAction extends Action{

	   

 
   

  
  
       //Metodo get da autenticacao
		public function getSignIn ( $request, $response){

			$vars['pagina']="Pagina de Administracao";
	        return   $this->view->render($response,"admin/login/login.phtml",$vars);

		}

      //metodo post da autenticacao
		public function postSignIn($request, $response){
			
			$result=$this->Auth->autenticar($request->getParam("usuario"), $request->getParam("senha"));

			if(!$result){
				return $response->withRedirect($this->router->pathFor('auth.entrar'));
			}
             
             
			return $response->withRedirect($this->router->pathFor('home.admin'));
		}

      //metodo get para inserir novo usuario
		public function getSignup($request, $response)
		{
			
		}

		//metodo post para inserir novo usuario
		public function postSignup($request, $response)
		{
			
		}

		public function SignOut($request,$response)
		{
			\RKA\Session::destroy();
			return $response->withRedirect($this->router->pathFor('home'));
		}

		
	}