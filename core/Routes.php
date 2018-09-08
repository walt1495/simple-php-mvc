<?php

class Routes{

	private $controller;
	private $method;
	private $args;

	public function __construct(){
		
		$query = (!empty($_GET['q'])) ? $_GET['q'] : null;
		if($query != null){
			$queryArray = explode('/',$query);
			$this->controller = (!empty($queryArray[0])) ? $queryArray[0].'Controller' : DEFAULT_CONTROLLER;
			$this->method = (!empty($queryArray[1])) ? $queryArray[1] : DEFAULT_METHOD;
			$this->args = (!empty($queryArray[2])) ? $queryArray[2] : null;
		}else{
			$this->controller = DEFAULT_CONTROLLER;
			$this->method = DEFAULT_METHOD;
			$this->args = null;
		}

		$this->setRoute();

	}

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