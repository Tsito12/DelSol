<?php
class Compra{
    private $id_compra;
    private $id_empleado;
    private $id_proveedor;
    private $total_v;
    private $fecha_compra;

    public function __construct($id_compra, $id_empleado, $id_proveedor, 
                                $total_v, $fecha_compra){
        
        $this->id_compra=$id_compra;
        $this->id_empleado=$id_empleado;
        $this->id_proveedor=$id_proveedor;
        $this->total_v=$total_v;
        $this->fecha_compra=$fecha_compra;

    }

    public function getIdCompra(){
        return $this->id_compra;
    }

    public function getIdEmpleado(){
        return $this->id_empleado;
    }

    public function getIdProveedor(){
        return $this->id_proveedor;
    }


    public function getTotalV(){
        return $this->total_v;
    }

    public function getFechaCompra(){
        return $this->fecha_compra;
    }
}
?>