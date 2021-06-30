<?php
class Cliente{
    private $id_cliente;
    private $nombre_cliente;
    private $direccion_cliente;
    private $telefono_cliente;
    private $correo_cliente;

    public function __construct($id_cliente,$nombre_cliente,$direccion_cliente,
                                $telefono_cliente,$correo_cliente){
        $this->id_cliente=$id_cliente;
        $this->nombre_cliente=$nombre_cliente;
        $this->direccion_cliente=$direccion_cliente;
        $this->telefono_cliente=$telefono_cliente;
        $this->correo_cliente=$correo_cliente;
    }

    public function getIdCliente(){
        return $this->id_cliente;
    }

    public function getNombreCliente(){
        return $this->nombre_cliente;
    }

    public function getDireccionCliente(){
        return $this->direccion_cliente;
    }

    public function getTelefonoCliente(){
        return $this->telefono_cliente;
    }

    public function getCorreoCliente(){
        return $this->correo_cliente;
    }
}
?>