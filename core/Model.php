<?php

/**
* Clase Model
* Clase base para los Modelos que definiremos en la carpeta models
*/
abstract class Model{

	/**
	* Atributo private que contendrá la conexion a la base de datos
	* @var object
	*/
	private $cnn;

	/**
	* Atributo private que contendrá la cadena de conexion a la base de datos
	* @var string
	*/
	private $dsn;

	/**
	* Atributo private que contendrá el usuario de la base de datos
	* @var string
	*/
	private $username;

	/**
	* Atributo private que contendrá la contraseña de la base de datos
	* @var string
	*/
	private $password;


	/**
	* Función Contructora
	* @param string $dbConfig Nombre del archivo que contiene los datos de conexión
	*/
	function __construct($dbConfig){
		$this->configConnection($dbConfig);
		try{
			$this->cnn = new PDO($this->dsn,$this->username,$this->password);
			$this->cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		}catch(PDOException $e){
			die('Ha ocurrido un error al Conectarse a la Base de Datos, error = '.$e->getMessage());
		}
	}

	/**
	* Funcion que nos permite obtener los datos de conexión desde un archivo
	* @param string $dbConfig Nombre del archivo que contiene los datos de conexión
	*/
	function configConnection($dbConfig){
		$file = DIR_CONFIG.$dbConfig;
		if(file_exists($file) && is_readable($file)){
			$parse = parse_ini_file($file,true);
			$driver = $parse['driver'];
			$host = $parse['host'];
			$port = (!empty($parse['port'])) ? $parse['port'] : null;
			$dbname = $parse['dbname'];
			$this->username = $parse['username'];
			$this->password = $parse['password'];

			if($port === null){
				$this->dsn = $driver.':host='.$host.';dbname='.$dbname.';charset=utf8';
			}else{
				$this->dsn = $driver.':host='.$host.';port='.$port.';dbname='.$dbname.';charset=utf8';
			}
		}else{
			die('Error, verifique que el archivo '.$dbConfig.' exista y se pueda leer');
		}
	}
}