<?php

spl_autoload_register(function ($nombre_clase) {
	$file = lcfirst($nombre_clase).'.php';
	if(file_exists(DIR_CONTROLLER.$file)){
		require_once(DIR_CONTROLLER.$file);
	}else if(file_exists(DIR_MODELS.$file)){
		require_once(DIR_MODELS.$file);
	}else{
		die('Clase '.$nombre_clase.' no existe');
	}
});

?>