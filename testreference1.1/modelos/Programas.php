<?php
	require_once 'libs/Modelo.php';

	class Programas extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "programas";
		}


		function getProgramas($nombre)
		{
			return $this->query("SELECT p.id, p.nombre  
				FROM universidades u
				JOIN programasuniversidades pu ON u.id = pu.id_universidad
				JOIN programas p ON pu.id_programa = p.id
				WHERE u.nombre='$nombre'");
		}
		

	}