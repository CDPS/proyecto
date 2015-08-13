<?php
//esta seccion recolectara los datos de los usuarios.
//para ellos es necesario importar nuestro modelo llamado usuario.
include_once ("lib/usuario.php");

//verificamos que los parametros de registro de un usuario sean enviados por metodo get.
if($_GET){	
	/*
	* se obtienen dichos valores.
	*/
    $nombre = $_GET["name"];
	$edad =  $_GET["age"];
	$username =  $_GET["username"];
	//creamos una instancia de la clase usuario.
	$usuario =  new Usuario($nombre, $edad, $username);	
	//se imprime el resultado de registrar un usuario.
	echo $usuario->registrarUsuario();
}
else die("Usuario no registrado");
	

?>

