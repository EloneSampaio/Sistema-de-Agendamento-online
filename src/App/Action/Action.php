<?php

namespace App\Action;

class Action {


	private $container;


	 function __construct($container){

          $this->container=$container;
	}

	 function __get($property){
       if($this->container->{$property}){
       	return $this->container->{$property};
       }
	}
}



