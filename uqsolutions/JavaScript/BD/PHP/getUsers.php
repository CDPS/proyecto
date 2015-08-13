<?php 
//PHP encargado de obtener todos los usuarios 
//para ellos es necesario importar nuestro modelo llamado usuario.
	include_once ("lib/usuario.php");
	//crear una instancia de un usuario.
	$usuario =  new Usuario();	
	// mediante la instancia de usuario realiza una peticion de los usuarios.
	$result = $usuario->getUsers();
	//Iniciamos crando la parte superior de la tabla.
	$html= "<tr>
				<td>Name</td>
				<td>Age</td>
				<td>Username</td>
			</tr>";
	//  con este foreach se recorren las filas retornadas con la consulta de los usuarios.
	foreach ($result as $row) {
		$html.= "<tr>";
		$html.= "<td>".$row["nombre"]."</td>";
		$html.= "<td>".$row["age"]."</td>";
		$html.= "<td>".$row["username"]."</td>";
		$html.= "</tr>";
	}
	echo $html;
?>

