<?php
namespace Src\System;

class DatabaseConnector {
    /**
    * @access private
    * @var DatabaseConnector
    */
    private $dbConnection = null;
    /**
    * Constructor de la clase DatabaseConnector
    */
    public function __construct()
    {
	/**
	* getenv() devuelve el valor de la variable de entorno indicada como parámetro
	* $host guardamos la ip o nombre de dominio del servidor donde está la base de datos
	* $port guardamos el puerto por el que vamos a conectar
	* $db guardamos el nombre de la base de datos
	* $user guardamos el nombre del usuario de la base de datos con el que vamos a conectar
	* $pass guardamos la contraseña del usuario de la base de datos
	*/
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $db   = getenv('DB_DATABASE');
        $user = getenv('DB_USERNAME');
        $pass = getenv('DB_PASSWORD');
	/**
	* Intentamos realizar la conexión a la base de datos mediante PDO con las variables anteriores
	* Capturamos los errores al conectar, cancelamos la conexión y mostramos el error
	*/
        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
    * Funcionalidad que devuelve la conexión
    * Si todo fue bien devolverá null
    * Si hubiera algún error podríamos ver el mensaje
    * @return dbConnection
    */
    public function getConnection()
    {
        return $this->dbConnection;
    }
}
