<?php

/**
* Routes
*/
class Routes{

	/**
	* Nombre de la clase controladora
	* @param string $controller Nombre del controlador
	*/
	private $controller;

	/**
	* Nombre del metodo dentro de una clase controladora
	* @param string $controller Nombre del metodo
	*/
	private $method;

	/**
	* Los argumentos que se le pasarán al metodo
	* @param array $controller Argumentos del metodo
	*/
	private $args;

	/**
	* Función Constructora
	* Obtendremos el controlador, el metodo y los argumentos
	* Dividimos la cadena que viene desde la url, la separación sera por "/"
	* Cada elemento de este arreglo corresponde al controlador, metodo y argumentos
	*/
	public function __construct(){
		$query = (!empty($_GET['q'])) ? $_GET['q'] : null;

		if($query != null){
			$queryArray = explode('/',$query);
			$this->controller = ucfirst($queryArray[0].'Controller');
			$this->method = (!empty($queryArray[1])) ? $queryArray[1] : DEFAULT_METHOD;
			$this->args = (!empty($queryArray[2])) ? $queryArray[2] : null;
		}else{
			$this->controller = ucfirst(DEFAULT_CONTROLLER.'Controller');
			$this->method = DEFAULT_METHOD;
			$this->args = null;
		}

		$this->setRoute();

	}

	/**
	* Funcion setRoute
	* Direccionaremos el pedido hacia el metodo del controlador correcto,
	* pasandole argumentos si fuese el caso
	*/
	private function setRoute(){
		$cont = new $this->controller();
		if(is_callable(array($cont,$this->method))){
			if($this->args == null){
				call_user_func(array($cont,$this->method));
			}else{
				call_user_func_array(array($cont,$this->method),array('arg' => $this->args));
			}
		}else{
			die('Metodo "'.$this->method.'" no existe');
		}		
	}

}

?>