<?php
class Cajero{
    private $ide;
    private $idc;
    private $numcaja;

    public function __construct($ide, $idc, $numcaja){
        $this->ide = $ide;
        $this->idc = $idc;
        $this->numcaja = $numcaja;
    }

    public function getIdEmpleado(){
        return $this->ide;
    }

    public function getIdCajero(){
        return $this->idc;
    }

    public function getNumCaja(){
        return $this->numcaja;
    }
}
?>