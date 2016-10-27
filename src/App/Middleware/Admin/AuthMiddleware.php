<?php

namespace App\Middleware\Admin;

class AuthMiddleware {


   public function __invoke($request, $response, $next)
    {
        $session = new \RKA\Session();
         $usuario = $session->usuario;
      if(!isset($usuario)){
      	return $response->withRedirect(PATH.'admin/login');
      }
        $response = $next($request, $response);
      
        return $response;
    }

}

