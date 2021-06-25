<?php
require_once "/var/www/html/DelSol/src/modelo/Data.php";
//require_once "../modelo/Compra.php";

$data = new Data();

$idp = $_POST['proveedor'];
$total = $_POST['total'];
$fecha = date("Y-m-d H:i:s");

//detalle compra
$codigos = $_POST['codigos'];
$cantidades = $_POST['cantidades'];
$id_empleado="E0000001";
$id_c=0;
$compra = new Compra($id_c,$id_empleado,$idp,$total,$fecha);
$descuento=$_POST['descuento'];
$porcentaje = 1-(intval($descuento)/100);
$total=round((floatval($total)*$porcentaje),2);
echo($compra->getIdProveedor()." ".$fecha." ".$compra->getIdEmpleado()." ".$total);
/*
$data->guardarCompra($compra);
$id_compra = $data->getIdCompra();
echo("<br>".$id_compra);
for($i = 0; $i<count($codigos);$i++){
    $detalleCompra = new DetalleCompra($id_compra, $codigos[$i],$cantidades[$i]);
    $data->guardarDetalleCompra($detalleCompra);
}
*/
//header("Location: ../vista/Pedidos.php");
?>