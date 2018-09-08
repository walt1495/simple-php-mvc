<?php

class Controller{

	private $folder;

	public function __construct($folder){
		$this->folder = $folder;
	}

	public function view($view,$datos=null){
		extract($datos);

		include_once DIR_VIEWS.$this->folder.DS.$view.'.php';
	}

}

?>