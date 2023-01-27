<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

use Src\System\DatabaseConnector;
//Cargamos la variable de entorno DIR
$dotenv = new DotEnv(__DIR__);
$dotenv->load();
//Iniciamos la conexión a la base de datos
$dbConnection = (new DatabaseConnector())->getConnection();
