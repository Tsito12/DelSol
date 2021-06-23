<?php

	class conectar{
		private $servidor="localhost";
		private $usuario="pma";
		private $password="hola0123456";
		private $bd="zapateriadelsol";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
						 $this->usuario,
						 $this->password,
						 $this->db);

			return $conexion;
		}
	}

	$obj=new conectar();
	var_dump($obj->conexion());

?>
