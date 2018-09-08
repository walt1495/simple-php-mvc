<?php
abstract class Model{

	private $cnn;
	private $dsn;
	private $username;
	private $password;

	function __construct($dbConfig){
		$this->configConnection($dbConfig);
		try{
			$this->cnn = new PDO($this->dsn,$this->username,$this->password);
			$this->cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		}catch(PDOException $e){
			die('Ha ocurrido un error al Conectarse a la Base de Datos, error = '.$e->getMessage());
		}
	}

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