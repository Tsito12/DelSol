<?php
class Usuario{
    private $usuario;
    private $pass;
    private $id;

    public function __construct($usuario, $pass, $id){
        $this->usuario=$usuario;
        $this->pass=$pass;
        $this->id=$id;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getPass(){
        return $this->pass;
    }

    public function getIdEmpleado(){
        return $this->id;
    }
}
?>