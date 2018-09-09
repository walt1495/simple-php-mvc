<?php

class UserController extends Controller{

	public function __construct(){
		parent::__construct('user');
	}

	public function index(){
		$data = array(
			'nombre' => 'Walter',
			'apellidos' => 'Almestar Rivera'
		);
		$this->view('index',$data);
	}

	public function hola(){
		$data = array(
			'nombre' => 'Jose',
			'apellidos' => 'Carranza Gonzales'
		);
		$this->view('hola',$data);
	}

	public function edit($id=null){
		if($id != null){
			echo $id;
		}else{
			die('Debe ingresar un id');
		}
	}
}