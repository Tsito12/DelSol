<?php
class Apartado{
    private $id_apartado;
    private $id_cliente;
    private $ultimo_abono;
    private $saldo_restante;
    private $status;
    private $codigo;

    public function __construct($id_apartado, $id_cliente, $ultimo_abono, $saldo_restante, $status, $codigo){
        $this->id_apartado=$id_apartado;
        $this->id_cliente=$id_cliente;
        $this->ultimo_abono=$ultimo_abono;
        $this->saldo_restante=$saldo_restante;
        $this->status=$status;
        $this->codigo=$codigo;
    }

    public function getIdApartado(){
        return $this->id_apartado;
    }

    public function getIdCliente(){
        return $this->id_cliente;
    }

    public function getUltimoAbono(){
        return $this->ultimo_abono;
    }

    public function getSaldoRestante(){
        return $this->saldo_restante;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getCodigo(){
        return $this->codigo;
    }
}
?>