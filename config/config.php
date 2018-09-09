<?php

/**
* Definición de las Constantes a usar durando toda la aplicación
*/

/**
* Dirección en el disco de nuestro proyecto
* @var string
*/
define('BASE_DIR',dirname(__dir__));

/**
* Separador de directorios, cambia segun el sistema operativo
* @var string
*/
define('DS',DIRECTORY_SEPARATOR);

/**
* Dirección en el disco de la carpeta config
* @var string
*/
define('DIR_CONFIG',BASE_DIR.DS.'config'.DS);

/**
* Dirección en el disco de la carpeta controllers
* @var string
*/
define('DIR_CONTROLLER',BASE_DIR.DS.'controllers'.DS);

/**
* Dirección en el disco de la carpeta models
* @var string
*/
define('DIR_MODELS',BASE_DIR.DS.'models'.DS);

/**
* Dirección en el disco de la carpeta views
* @var string
*/
define('DIR_VIEWS',BASE_DIR.DS.'views'.DS);

/**
* Definir un controlador por defecto
* @var string
*/
define('DEFAULT_CONTROLLER','home');

/**
* Definir un metodo dentro del controlador por defecto
* @var string
*/
define('DEFAULT_METHOD','index');


/**
* Definir la url base de nuestro proyecto
* @var string
*/
define('BASE_URL','http://localhost/php-mvc/');

?>