<?php
	require_once 'libs/Modelo.php';

	class User extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "users";
		}

		function createUser($values) {

			$llaves  = array("nombre","apellido","username","pass");
			$consulta= $this->insert($llaves, $values);
			$result =  $consulta->execute();
			//$result = $this->query($consulta);
			return $result;
		}

		function authenticate($username,$pass){
			return  $this->query("Select * from users where username='$username' and pass='$pass'");

		}	
	}