<?php
	require_once 'libs/Modelo.php';

	class Universidades extends Modelo{


		function __construct(){
			parent::__construct();
			$this->nombreTabla = "universidades";
		}


		function getUniversidades()
		{
			return $this->query("Select nombre from $this->nombreTabla");
		}
		
        function getUsConId()
		{
			return $this->query("Select * from $this->nombreTabla");
		}        

	}