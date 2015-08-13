<?php
	require_once 'libs/Modelo.php';

	class Imagenes extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "imagenes";
		}

		function createImages($values) {

			$llaves  = array("ruta","descripcion");
			$consulta= $this->insert($llaves, $values);
			$result =  $consulta->execute();
			//$result = $this->query($consulta);
			return $result;
		}

	}