	<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set("display_errors",'ON');

	require 'vendor/autoload.php';
	require 'config/constants.php';
	require 'config/config.php';

	$app = new \Slim\App(["settings" => $config]);
	$app->add(new \RKA\SessionMiddleware(['nome' => 'NovaSessao']));
	
   
    require 'src/App/dependencia.php';
	require 'src/App/routes.php';


	$app->run();