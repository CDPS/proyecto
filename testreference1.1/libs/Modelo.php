<?php

	class Modelo {

		private $host = "mysql.hostinger.es";
		private $db_name = "u182580871_test";
		private $username = "u182580871_root";
		private $password = "OquendoPalechor";

		protected $conexion;

		protected $nombreTabla;
		
		function Modelo(){
			try {
    			$this->conexion = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
			}
			catch(PDOException $exception){
    			echo "Connection error: " . $exception->getMessage();
			}

		}

		protected function query($query){

 			return $this->conexion->query($query);
		}

		protected function insert($llaves, $values) {

			$query = "insert into $this->nombreTabla (";

			if ($llaves == null) {


			} else {

				$coma = " ";

				foreach ($llaves as $llave) {
					# code...
					$query .= $coma.$llave;
					$coma = ",";
				}
			}

			$query .= ") values ("; 

			if ($values != null) {

				$and = " ";

				foreach ($values as $value) {
					# code...

					$query .= $and.'?';
					$and = ",";
				}

				$contador = 1;
				$query .= ")";
				$preparedQuery =  $this->conexion->prepare($query);

				foreach ($values as $value) {	
					$preparedQuery->bindValue($contador, $value, PDO::PARAM_STR);
					$contador++;
				}
			}

			
			return $preparedQuery; 

		}

		protected function select($llaves, $where) {

			$query = "select ";

			if ($llaves == null) {

				$query .= "* ";

			} else {

				$coma = " ";

				foreach ($llaves as $llave) {
					# code...
					$query .= $coma.$llave;
					$coma = ",";
				}
			}

			$query .= " from $this->nombreTabla"; 

			if ($where != null) {

				$and = " ";

				$query .= " where";

				foreach ($where as $value) {
					# code...

					$query .= $and.$value;
					$and = " and ";
				}
			}

			return $query; 

		}

		protected function update($llaves, $where) {

			$query = "update $this->nombreTabla set ";

			if ($llaves == null) {

				$query .= "* ";

			} else {

				$coma = " ";

				foreach ($llaves as $llave) {
					# code...
					$query .= $coma.$llave;
					$coma = ",";
				}
			}

			if ($where != null) {

				$and = " ";

				$query .= " where";

				foreach ($where as $key) {
					# code...

					$query .= $and.$key;
					$and = " and ";
				}
			}

			return $query; 

		}

		protected function delete($where) {

			$query = "delete freom $this->nombreTabla";

			if ($where != null) {

				$and = " ";

				$query .= " where";

				foreach ($where as $key) {
					# code...

					$query .= $and.$key;
					$and = " and ";
				}
			}

			return $query; 

		}

	}