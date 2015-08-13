<?php
	require_once 'libs/Modelo.php';

	class Usuario extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "usuario";
		}

		function getUsuarios(){
			return $this->query("Select * from $this->nombreTabla");
		}

		function selectU() {

			$llaves  = array("nombre");
			$condiciones=array("edad=19");

			$consulta= $this->select($llaves, $condiciones);
			echo $consulta;
			return $this->query($consulta);

		}

		
	}