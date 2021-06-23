<?php
class DetalleCompra{
    private $id_compra;
    private $codigo;
    private $cantidad;

    public function __construct($id_compra, $codigo, $cantidad){
        
        $this->id_compra=$id_compra;
        $this->codigo=$codigo;
        $this->cantidad=$cantidad;

    }

    public function getIdCompra(){
        return $this->id_compra;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getCantidad(){
        return $this->cantidad;
    }
}
?>