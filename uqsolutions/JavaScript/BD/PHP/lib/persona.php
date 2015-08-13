<?php 
/*
* Creamos una clase de tipo persona donde se mapean algunos elementos
* de unas personas.
*/
class Persona{
	/**
	* Se mapean las variables de las personas.
	*/
	protected $name;
	protected $edad;
	/**
	* Constructor de la persona
	*/
	function Persona($nombre,  $edad){
		$this->name = $nombre;		
		$this->edad =  $edad;
	}
}

