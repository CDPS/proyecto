<?php
	require_once 'libs/Modelo.php';

	class Semestres extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "semestres";
		}


		function getSemestres($nombre)
		{
			return $this->query("SELECT s.nombre 
				FROM semestres s
				JOIN semestresprogramas sp ON s.id = sp.id_semestre
				JOIN programas p ON sp.id_programa = p.id
				WHERE p.nombre='$nombre'");
		}
		
		function getSemestresId($id)
		{
			return $this->query("SELECT s.nombre,s.id
				FROM semestres s
				JOIN semestresprogramas sp ON s.id = sp.id_semestre
				JOIN programas p ON sp.id_programa = p.id
				WHERE p.id=$id");
		}

	}