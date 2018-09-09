<?php

/**
* Clase Controller
* Clase base para los Controladores que definiremos en la carpeta controllers
*/

class Controller{

	/**
	* Carpeta que contendrá las vistas del controlador
	* @var string
	*/
	protected $folder;

	/**
	* Función Contructora
	* @param string $folder la carpeta que contendra las vistas del controlador
	*/
	public function __construct($folder){
		$this->folder = $folder;
	}

	/**
	* Renderiza una vista
	* @param string $view Vista a renderizar
	* @param array $data Datos que se le enviaran a la vista(Opcional)
	*/
	public function view($view,$data=null){
		extract($data);

		include_once DIR_VIEWS.$this->folder.DS.$view.'.php';
	}

}

?>