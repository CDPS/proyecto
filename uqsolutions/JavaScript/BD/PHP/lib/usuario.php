<?php 
include 'lib/persona.php';
class Usuario extends Persona{
	
	private $username ;

	/**
	* Constructor  del modelo.
	*/
	function Usuario($nombre='def', $edad='def', $username='def'){
		$this->username =  $username;
		parent::Persona( $nombre, $edad );
	}
	/**
	* Es una version que obtiene los datos de un usuario.
	*/
	function getData(){
		return $this->name." : ".$this->edad." : ".$this->username;
	}
	/**
	* Realiza una consulta para obtener todos los usuarios.
	*/
	function getUsers(){
		include 'lib/db_connect.php';
		$query = "SELECT * from users";
		$result = $conexion->query($query);
		
		return $result;
		
	}

	/**
	* Registra un usuario en la base de datos, esta funcionalidad
	* posee un problema de inyeccion de codigo, el cual podemos validar ingresando
	* codigo HTML dentro de los campos de registros en el html.
	*/
	function registrarUsuario(){
	    try{
	  		include 'lib/db_connect.php';
	        //write query
	        $query = "INSERT INTO users SET nombre = ?, age = ?, username = ?";
	  
	  
	        $stmt = $conexion->prepare($query);  
	        
	         $stmt->bindParam(1, $this->name);
	         $stmt->bindParam(2, $this->edad);
	         $stmt->bindParam(3, $this->username);	  		
	  
	        // Execute the query
	        if($stmt->execute()){
	            return "Guardo";	          
	        }else{
	        	return "no guardo";	        	
	        }
	  
	    }catch(PDOException $exception){ //to handle error
	        return  "Error: " . $exception->getMessage();
	    }
	}

	
}