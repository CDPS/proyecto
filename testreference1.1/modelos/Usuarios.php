<?php
	require_once 'libs/Modelo.php';

	class Usuarios extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "usuarios";
		}
                
        	function createUser($values) {

			$llaves  = array("nombre","apellidos","username","contrasenia","id_universidad","id_programa");
			$consulta= $this->insert($llaves, $values);
			$result =  $consulta->execute();
			//$result = $this->query($consulta);
			return $result;
		}

		function authenticate($username,$contrasenia) {
                    
			return  $this->query("Select * from usuarios where username='$username' and contrasenia='$contrasenia'");
		}

		function getUsuario($username){

			return  $this->query("Select * from usuarios where username='$username'");
		}
		function getUsuarios(){
			return $this->query("Select * from $this->nombreTabla");
		}

		function getPerfil($username){

   			return  $this->query("SELECT u.nombre as nombreU, u.apellidos as apellidosU,
   			 						p.nombre as nombreP, un.nombre as nombreUN
   									FROM usuarios u 
   									JOIN programas p ON u.id_programa=p.id
   									JOIN universidades un ON u.id_universidad=un.id
   									WHERE username='$username'");
  		}

		function selectU() {

			$llaves  = array("nombre");
			$condiciones=array("edad=19");

			$consulta= $this->select($llaves, $condiciones);
			echo $consulta;
			return $this->query($consulta);

		}

		
	}