<?php
	require_once 'libs/Modelo.php';

	class Espacios extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "espaciosacademicos";
		}


		function getEspacios($nombre)
		{
			return $this->query("SELECT ea.nombre,ea.id 
				FROM semestres s
				JOIN espaciossemestres es ON s.id = es.id_semestre
				JOIN espaciosacademicos ea ON es.id_espacio = ea.id
				WHERE s.nombre='$nombre'");
		}
		
		function getEspaciosId($id)
		{
			return $this->query("SELECT ea.nombre, ea.id
				FROM semestres s
				JOIN espaciossemestres es ON s.id = es.id_semestre
				JOIN espaciosacademicos ea ON es.id_espacio = ea.id
				WHERE s.id=$id");
		}
	}