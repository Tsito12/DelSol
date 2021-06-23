<?php
require_once "../modelo/Data.php";

$data = new Data();
$modelo = $_POST['modelo'];
$sapato = $data->getSapatoMod($modelo);
$codigo = $sapato->getCodigo();
$tallas = $data->getTallas($codigo);

echo($sapato->getDescripcion().",".$sapato->getPrecioCompra().",".$sapato->getIdProveedor().
",".$sapato->getCodigo().",".$sapato->getExistencia());
for($i=0;$i<count($tallas);$i++){
    echo(",".$tallas[$i]);
}
?>