<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;



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
    'charset' => 'UTF8',
    'driverOptions' => array(1002 => 'SET NAMES utf8')
);

$configDoctrine = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

$entityManager = EntityManager::create($dbParams, $configDoctrine);