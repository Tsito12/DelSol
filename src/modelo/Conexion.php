<?php

	class Conexion{
		private $conexion;
		public function __construct($servidor, $bd, $usuario, $password){
			$this->conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			
			if(!$this->conexion){
				echo "NO conecto esta madre";
				die("Error al conectar: ".mysql_error());
			}

			$selBD = mysqli_select_db($this->conexion,$bd);

			if(!$selBD){
				die("Error al seleccionar la base de datos");
			}
		}

		public function getCon(){
			return $this->conexion;
		}

		public function ejecutar($query){
			return mysqli_query($this->conexion,$query);
		}
	}

	/*
	$obj = new Conexion("localhost","zapateriadelsol","pma","hola0123456");
	var_dump($obj->getCon());
	*/

?>
