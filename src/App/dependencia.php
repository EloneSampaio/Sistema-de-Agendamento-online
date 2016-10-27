	<?php

	// Doctrine

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\Auth\Authenticar as Autenticar;
	

$container = $app->getContainer();

    $container['view'] =function($c){
      $view= new \Slim\Views\PhpRenderer("resources/views/");
      return $view;
    };

  

	$container['em'] = function ($c) {
	   
	   $isDevMode = true;


	// the connection configuration
	$paths = array(
	    "src/App/Entities"
	);

	$dbParams = array(
	    'driver'   => 'pdo_mysql',
	    'user'     => 'root',
	    'password' => '',
	    'dbname'   => 'dataangola',
	);

	$configDoctrine = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

	        return EntityManager::create($dbParams, $configDoctrine);

	 };

	  $container['usuario'] = function ($c) {
	    return new App\Model\UserModel($c->get('em'));
	  
	};
	
	  $container['usuarioLogin'] = function ($c) {
	    return new App\Model\UserModel($c->get('em'));
	  
	};

  $container['evento'] = function ($c) {
	    return new App\Model\EventoModel($c->get('em'));
	  
	};

	  $container['vaga'] = function ($c) {
	    return new App\Model\vagaModel($c->get('em'));
	  
	};




	  $container['Auth'] = function ($c) {
	   
	    return new Autenticar($c) ;
	};



