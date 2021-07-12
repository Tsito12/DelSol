<?php
require_once "../modelo/Data.php";

$accion = $_POST['action'];
$d = new Data();
if($accion=="buscarCliente"){
    $idc = $_POST['idc'];
    $cliente = $d->getCliente($idc);
    echo($cliente->getIdCliente().";".
         $cliente->getNombreCliente().";".
         $cliente->getDireccionCliente().";".
         $cliente->getTelefonoCliente().";".
         $cliente->getCorreoCliente());
}
elseif($accion=="buscarZapato"){
    $codigo = $_POST['codigo'];
    $sapato = $d->getSapato($codigo);
    echo($sapato->getCodigo()."/".
         $sapato->getModelo()."/".
         $sapato->getDescripcion()."/".
         $sapato->getExistencia()."/".
         $sapato->getPrecioVenta());
}
elseif($accion=="guardarVenta"){
    $total = $_POST['total'];
    $ide = $_POST['ide'];
    $idc = $_POST['idc'];
    $codigos = $_POST['codigos'];
    $cantidades = $_POST['cantidades'];
    $error = $d->guardarVenta($idc,$ide,$total);
    echo ($error);
    $idv = $d->getIdVenta();
    $nerror = "";
    for($i = 0; $i<count($codigos);$i++){
        $nerror .= $d->insertDetalleVenta($idv, $codigos[$i], $cantidades[$i]);
    }
    echo(" ".$nerror);
}
?>