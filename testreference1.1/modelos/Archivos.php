<?php
	require_once 'libs/Modelo.php';

	class Archivos extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "archivos";
		}

		function createImages($values) {

			$llaves  = array("id_Usuario","id_profe","id_espacio","ruta","descripcion");
			$consulta= $this->insert($llaves, $values);
			$result =  $consulta->execute();
			//$result = $this->query($consulta);
			return $result;
		}

		function getArchivos($id){
			return $this->query("SELECT p.nombre, a.descripcion, a.id 
				FROM archivos a JOIN profesores p on a.id_profe =p.codigo  
				WHERE a.id_espacio = $id");
		}

		function getImagen($id){
			return $this->query("SELECT * FROM archivos WHERE id = $id");
		}
	}