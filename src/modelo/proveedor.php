<?php
class Proveedor{
    private $id_proveedor;
    private $razon_social;
    private $direccion_proveedor;
    private $telefono_proveedor;
    private $correo_proveedor;
    private $rfc_proveedor;

    public function __construct($id_proveedor, $razon_social, $direccion_proveedor, 
                                $telefono_proveedor, $correo_proveedor, 
                                $rfc_proveedor){
        $this->id_proveedor=$id_proveedor;
        $this->razon_social=$razon_social;
        $this->direccion_proveedor=$direccion_proveedor;
        $this->telefono_proveedor=$telefono_proveedor;
        $this->correo_proveedor=$correo_proveedor;
        $this->rfc_proveedor=$rfc_proveedor;

    }

    public function getIdProveedor(){
        return $this->id_proveedor;
    }

    public function getRazonSocial(){
        return $this->razon_social;
    }

    public function getDireccionProveedor(){
        return $this->direccion_proveedor;
    }

    public function getTelefonoProveedor(){
        return $this->telefono_proveedor;
    }

    public function getCorreoProveedor(){
        return $this->correo_proveedor;
    }

    public function getRfcProveedor(){
        return $this->rfc_proveedor;
    }
}
?>