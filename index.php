<?php
/*
Archivo de inicio para la aplicacion, toda la entrada estara dirigidad a este archivo
*/

require_once('config/config.php');
require_once('config/autoload.php');
require_once('core/Model.php');
require_once('core/Routes.php');
require_once('core/Controller.php');

$routes = new Routes();

?>
