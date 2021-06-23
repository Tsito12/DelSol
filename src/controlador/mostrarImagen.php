<?php
require_once "../modelo/Data.php";

if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
    $d = new Data();
    $sapato = $d->getSapato($codigo);
    $imagen = $sapato->getImagen();

    header("content-type: image/png");
    echo $imagen;
}
?>