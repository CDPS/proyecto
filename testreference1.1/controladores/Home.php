<?php
	

include "libs/controlador.php";
class Home extends Controlador{


	public function imprimir()
	{
		echo "hola";
        print_r( $this->parametros);
	}

	public function index(){

		$this->cargarVista("index");
	}	

	public function seleccionar()
	{
		$usuario = $this->cargarModelo("Usuario");
		$result = $usuario->selectU();
	
		foreach ($result as $row){
		print_r($row);
		}
	}


	public function register()
	{

			if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
                $nombre = $_POST["nombre"];
				$username =  $_POST["username"];
				$contrasenia =  $_POST["contrasenia"];
				$apellidos =  $_POST["apellidos"];
				$universidad = $_POST["universidad"];
				$programa = $_POST["programa"];
				
				if ($nombre != null && $username != null && $contrasenia != null && $apellidos!=null
						&& $universidad != null && $programa != null) {

					$user = $this->cargarModelo("Usuarios");

					$values = array($nombre,$apellidos,$username,$contrasenia,$universidad,$programa);

					$result = $user->createUser($values);

					$this->index();
				}
	
			}
			else die("Usuario no registrado");
				
	}

	public function login()
	{

		$username = $_POST["username"];
		$contrasenia = $_POST["contrasenia"];
       
        $modelo = $this->cargarModelo("Usuarios");
        $respuesta = $modelo->authenticate($username,$contrasenia);
	
        if($respuesta!=null && $respuesta->rowCount()>0)
    	{
                setcookie("chsm","".$username,time()+600,"/","localhost");
                //header("Location: /testreference1.1/");
                //$this->cargarVista("index");
                echo "/testreference1.1/";
                exit;
        }else{
                $_POST["errorLogin"] = "login fallido";
                $this->cargarVista("index");
                echo "Falló";
        }
	}

	public function verPerfil() {

		if(!isset($_COOKIE["chsm"])&&(!isset($_SESSION['facebook']))) {

		} else {

			$username = $_COOKIE["chsm"];

			$modelo = $this->cargarModelo("Usuarios");
			$result = $modelo->getPerfil($username);

			foreach ($result as $row) {

				$nombreU=$row["nombreU"];
    			$apellidosU=$row["apellidosU"];
    			$nombreP=$row["nombreP"];
    			$nombreUN=$row["nombreUN"];
			}
    		
    		$res = array('name'=>$nombreU, 'lastname'=>$apellidosU,
    					'nameP'=>$nombreP, 'nameU'=>$nombreUN);

			echo json_encode($res);
		}
	}

	public function getUs(){

		$universidades = $this->cargarModelo("Universidades");
		$result = $universidades->getUniversidades();
		
		$html = "<style type=\"text/css\">
					.listaU {

							font-size: 25px;
							font-family: \"Rockwell\", serif;
							margin: 25px;
					}

					.uniR {

						font-size: 20px;
						font-family: \"Rockwell\", serif;
						margin-left: 50px;
						cursor: pointer;
					}

					.uniR:hover {
					    
					    color: green;
					}

					@media (min-width : 321px) and (max-width: 767px) {

						.uniR {

							font-size: 18px;
						}
					}

					@media (max-width : 320px) {

						.uniR {

							font-size: 16px;
						}
					}

				</style>";

		$html.= "<div class= \"listaU\">
				Universidades
				</div> ";

		//  con este foreach se recorren las filas retornadas con la consulta de los usuarios.
		foreach ($result as $row) {
			$html.= "<div id=\"".$row["nombre"]."\" onclick=\"auxU('".$row["nombre"]."')\"class=\"uniR\" >".$row["nombre"]."</div><br> ";
		}
		echo $html;
	}

	public function getProgramas(){


		$nombre = $_POST["universidad"];
		$programas = $this->cargarModelo("Programas");
		$result = $programas->getProgramas($nombre);
		
		$html = "<style type=\"text/css\">
					.listaP {

							font-size: 25px;
							font-family: \"Rockwell\", serif;
							margin: 25px;
					}

					.programR {

						font-size: 20px;
						font-family: \"Rockwell\", serif;
						margin-left: 50px;
						cursor: pointer;
					}

					.programR:hover {
					    
					    color: green;
					}

					@media (min-width : 321px) and (max-width: 767px) {

						.programR {

							font-size: 18px;
						}
					}

					@media (max-width : 320px) {

						.programR {

							font-size: 16px;
						}
					}

				</style>";

		$html.= "<div class= \"listaP\">
				Programas
				</div> ";

		//  con este foreach se recorren las filas retornadas con la consulta de los usuarios.

		if ($result == null) {

			echo "Esta universidad aun no tiene programas asociados";

		} else {

			foreach ($result as $row) {
				$html.= "<div id=\"".$row["nombre"]."\" onclick=\"auxP('".$row["nombre"]."')\"class=\"programR\" >".$row["nombre"]."</div><br> ";
			}
			echo $html;
		}
	}

	public function getSemestres(){


		$nombre = $_POST["programa"];
		$semestres = $this->cargarModelo("Semestres");
		$result = $semestres->getSemestres($nombre);
		
		$html = "<style type=\"text/css\">
					.listaS {

							font-size: 25px;
							font-family: \"Rockwell\", serif;
							margin: 25px;
					}

					.semR {

						font-size: 20px;
						font-family: \"Rockwell\", serif;
						margin-left: 50px;
						cursor: pointer;
					}

					.semR:hover {
					    
					    color: green;
					}

					@media (min-width : 321px) and (max-width: 767px) {

						.semR {

							font-size: 18px;
						}
					}

					@media (max-width : 320px) {

						.semR {

							font-size: 16px;
						}
					}

				</style>";

		$html.= "<div class= \"listaS\">
				Semestres
				</div> ";

		//  con este foreach se recorren las filas retornadas con la consulta de los usuarios.

		if ($result == null) {

			echo "Este programa aun no tiene semestres asociados";

		} else {

			foreach ($result as $row) {
				$html.= "<div id=\"".$row["nombre"]."\" onclick=\"auxS('".$row["nombre"]."')\"class=\"semR\" >".$row["nombre"]."</div><br> ";
			}
			echo $html;
		}
	}


	public function getEspacios(){


		$nombre = $_POST["semestre"];
		$espacios = $this->cargarModelo("Espacios");
		$result = $espacios->getEspacios($nombre);
		
		$html = "<style type=\"text/css\">
					.listaE {

							font-size: 25px;
							font-family: \"Rockwell\", serif;
							margin: 25px;
					}

					.espR {

						font-size: 20px;
						font-family: \"Rockwell\", serif;
						margin-left: 50px;
						cursor: pointer;
					}

					.espR:hover {
					    
					    color: green;
					}

					@media (min-width : 321px) and (max-width: 767px) {

						.espR {

							font-size: 18px;
						}
					}

					@media (max-width : 320px) {

						.espR {

							font-size: 16px;
						}
					}

				</style>";

		$html.= "<div class= \"listaE\">
				Espacios Academicos
				</div> ";

		//  con este foreach se recorren las filas retornadas con la consulta de los usuarios.

		if ($result == null) {

			echo "Este semestre aun no tiene espacios academicos asociados";

		} else {

			foreach ($result as $row) {
				$html.= "<div id=\"".$row["id"]."\" onclick=\"auxA('".$row["id"]."')\"class=\"espR\" >".$row["nombre"]."</div><br> ";
			}
			echo $html;
		}
	}

	public function getArchivos(){


		$espacios = $_POST["espacios"];
		$archivos = $this->cargarModelo("Archivos");
		
		$result = $archivos->getArchivos($espacios);
		
		$html = "<style type=\"text/css\">
					.listaA {

							font-size: 25px;
							font-family: \"Rockwell\", serif;
							margin: 25px;
					}

					.espA {

						font-size: 20px;
						font-family: \"Rockwell\", serif;
						margin-left: 50px;
						cursor: pointer;
					}

					.espA:hover {
					    
					    color: green;
					}

					@media (min-width : 321px) and (max-width: 767px) {

						.espA {

							font-size: 18px;
						}
					}

					@media (max-width : 320px) {

						.espA {

							font-size: 16px;
						}
					}

				</style>";

		$html.= "<div class= \"listaA\">
					Archivos relacionados
				</div> ";

		//  con este foreach se recorren las filas retornadas con la consulta de los usuarios.

		if ($result == null) {

			echo "Este programa no tiene archivos asociados";

		} else {

			foreach ($result as $row) {
				$html.= "<div id=\"".$row["id"]."\" onclick=\"auxI('".$row["id"]."')\"class=\"espA\" >".$row["nombre"].": ".$row["descripcion"]."</div><br> ";
			}
			echo $html;
		}
	}

	public function getImagen()
	{
		$imagen= $_POST["archivo"];
		$archivos = $this->cargarModelo("Archivos");
		
		$result = $archivos->getImagen($imagen);

		foreach ($result as $row) {
				$id=$row["id"];
				$ruta=$row["ruta"];
				$desc=$row["descripcion"];
		}

		$res = array( "ruta" =>$ruta ,"descripcion" =>$desc);

		$_POST["ruta"]=$ruta;

		echo json_encode($res);
	}

	public function subirImagen(){
		
		$rutaServidor="recursos";
		$rutatemp=$_FILES['imagen']['tmp_name'];
		$nombreImagen=$_FILES['imagen']['name'];
		
		if (!isset($_COOKIE["chsm"])) {

			print "Debe iniciar sesion";
			exit();
		}

		$username=$_COOKIE["chsm"];
		$rutaDestino= $rutaServidor."/".$nombreImagen;

		move_uploaded_file($rutatemp, $rutaDestino);
		$desc = $_POST['descripcion'];
		$espacio = $_POST['espacioA'];
		$profesor = $_POST['profesor'];
		$imagen = $this->cargarModelo("Archivos");

		
		$values = array($username,$profesor,$espacio,$rutaDestino,$desc);

		$result = $imagen->createImages($values);

		print "La imagen se subio con exito";
	}


	

	public function logout()
	{
		
		session_start();

		unset($_SESSION['facebook']);
		
		setcookie("chsm","",time()-3600,"/","localhost");
		header("Location: /testreference1.1");
		
	}

	public function cargarUniversidades () {

		$modelo = $this->cargarModelo("Universidades");
		$respuesta = $modelo->getUsConId();
		$html = "";

		foreach ($respuesta as $row) {

			$html.="<option onclick=\"auxUC('".$row["nombre"]."')\" value=".$row["id"].">".$row["nombre"]."</option>";
		}
		
		$this->cargarVista("form", $html);
		
	}

	public function cargarSemestres(){
		
		if (isset($_COOKIE["chsm"])) 
		{
			
			$modelo = $this->cargarModelo("Usuarios");
			$usuario = $modelo->getUsuario($_COOKIE["chsm"]);
			
			foreach ($usuario as $row) {
				$id=$row["id_programa"];
			}
			

			$modelo = $this->cargarModelo("Semestres");
			$respuesta= $modelo->getSemestresId($id);
			$html = "";

			foreach ($respuesta as $row) {

				$html.="<option onclick=\"auxSC('".$row["id"]."')\" value=".$row["id"].">".$row["nombre"]."</option>";
			}
			$this->cargarVista("subirImagen", $html);
		}

	}

	public function cargarEspacios(){
		
		$semestre = $_POST['semestre'];

		$modelo = $this->cargarModelo("Espacios");
		
		$respuesta = $modelo->getEspaciosId($semestre);
		
		$html = "<option value='0'>Espacios Academicos</option>";

		foreach ($respuesta as $row) {

			$html.="<option onclick=\"auxPC('".$row["id"]."')\" value=".$row["id"].">".$row["nombre"]."</option>";
		}
		
		echo $html;
	}
	public function cargarProfesores(){
		
		$espacio = $_POST['espacio'];

		$modelo = $this->cargarModelo("Profesores");
		
		$respuesta = $modelo->getProfesorID($espacio);
		
		
		$html = "<option value='0'>Profesores</option>";
		foreach ($respuesta as $row) {

			$html.="<option value=".$row["codigo"].">".$row["nombre"]." ".$row["apellido"] ."</option>";
		}
		
		echo $html;
	}
	

	public function cargarProgramas () {

		echo "obtiene unuversidad";
		$universidad = $_POST['universidad'];

		$modelo = $this->cargarModelo("Programas");
		echo "carga modelo";
		$respuesta = $modelo->getProgramas($universidad);
		echo "obtiene consulta";
		$html = "<option value='0'>Programas</option>";

		foreach ($respuesta as $row) {

			$html.="<option onclick=\"auxPC('".$row["nombre"]."')\" value=".$row["id"].">".$row["nombre"]."</option>";
		}
		
		echo $html;
	}


}

