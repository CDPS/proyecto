<?php
	require_once 'libs/Modelo.php';

	class Profesores extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "profesores";
		}
		
		function getProfesorID($id)
		{
			return $this->query("SELECT  p.codigo,p.nombre,p.apellido
				FROM profesores p
				JOIN espaciosprofesores ep ON ep.id_profe = p.codigo
				JOIN espaciosacademicos ea ON ea.id = ep.id_espacio
				WHERE ea.id=$id");
		}
	}