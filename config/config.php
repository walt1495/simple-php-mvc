<?php
define('BASE_DIR',dirname(__dir__));
define('DS',DIRECTORY_SEPARATOR);
define('DIR_CONFIG',BASE_DIR.DS.'config'.DS);
define('DIR_CONTROLLER',BASE_DIR.DS.'controllers'.DS);
define('DIR_MODELS',BASE_DIR.DS.'models'.DS);
define('DIR_VIEWS',BASE_DIR.DS.'views'.DS);
define('DEFAULT_CONTROLLER','homeController');
define('DEFAULT_METHOD','index');
define('DEFAULT_VIEW','index');

/*CAMBIAR LA URL DE TU SERVIDOR*/
define('BASE_URL','http://localhost/php-mvc/');

?>