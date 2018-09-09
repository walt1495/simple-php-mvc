<?php
/*
	Archivo de inicio para la aplicacion, toda la entrada estara dirigidad a este archivo.
	Primero requerimos todos los archivos basicos para iniciar.
*/

require_once('config/config.php');
require_once('config/autoload.php');
require_once('core/Model.php');
require_once('core/Routes.php');
require_once('core/Controller.php');

/**
* Llamada a la clase Routes que se encarga de manejar el direccionamiento hacia el controlador
* @var object
*/

$routes = new Routes();

?>
