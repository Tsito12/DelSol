<?php
class Empleado{
    private $id_empleado;
    private $nombre_empleado;
    private $apellido1_empleado;
    private $apellido2_empleado;
    private $sexo;
    private $edad;
    private $rfc_empleado;
    private $sueldo_base;
    private $puesto;
    private $usuario;
    private $contrasenia;

    public function __construct($id_empleado, $nombre_empleado, $apellido1_empleado, $apellido2_empleado, $sexo, $edad, 
                $rfc_empleado, $sueldo_base, $puesto, $usuario, $contrasenia){
        $this->id_empleado=$id_empleado;
        $this->nombre_empleado=$nombre_empleado;
        $this->apellido1_empleado=$apellido1_empleado;
        $this->apellido2_empleado=$apellido2_empleado;
        $this->sexo=$sexo;
        $this->edad=$edad;
        $this->rfc_empleado=$rfc_empleado;
        $this->sueldo_base=$sueldo_base;
        $this->puesto=$puesto;
        $this->usuario=$usuario;
        $this->contrasenia=$contrasenia;
    }

    public function getIdEmpleado(){
        return $this->id_empleado;
    }

    public function getNombreEmpleado(){
        return $this->nombre_empleado;
    }

    public function getApellido1Empleado(){
        return $this->apellido1_empleado;
    }

    public function getApellido2Empleado(){
        return $this->apellido2_empleado;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getRfcEmpleado(){
        return $this->rfc_empleado;
    }

    public function getSueldoBase(){
        return $this->sueldo_base;
    }

    public function getPuesto(){
        return $this->puesto;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getContrasenia(){
        return $this->contrasenia;
    }
}
?>