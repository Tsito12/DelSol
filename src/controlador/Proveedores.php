<?php
require_once "../modelo/Data.php";

$data = new Data();
$razon_social = $_POST['razonsocial'];
$direccion    = $_POST['direccion'];
$telefono     = $_POST['telefono'];
$email        = $_POST['email'];
$rfc          = $_POST['rfc'];
$accion       = $_POST['accion'];
$idp          = $_POST['codigo'];

if($accion==="editar"){
    $proveedor_e = new Proveedor($idp,$razon_social, $direccion, $telefono, $email, $rfc);
    $data->editarProveedor($proveedor_e);
    echo("Datos editados correctamente");
    //header("Location: ../vista/Proveedores.php");
    exit;
}
elseif ($accion === "borrar"){
    $data->deleteProveedor($idp);
    header("Location: ../vista/Proveedores.php");
    exit;
}

$proveedor = new Proveedor(1,$razon_social, $direccion, $telefono, $email, $rfc);
$data->guardarProveedor($proveedor);
echo("Datos insertados correctamente");
//header("Location: ../vista/Proveedores.php");
?>