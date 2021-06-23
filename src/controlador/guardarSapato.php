<?php
require_once "../modelo/Data.php";

$data = new Data();
/*
$descripcion=$sapato->getDescripcion();
$modelo=$sapato->getModelo();
$color=$sapato->getColor();
$precio_compra=$sapato->getPrecioCompra();
$precio_venta=$sapato->getPrecioVenta();
$existencia=$sapato->getExistencia();
$imagen=$sapato->getImagen();
$id_proveedor=$sapato->getIdProveedor();
*/
$descripcion=$_POST['descripcion'];
$modelo=$_POST['modelo'];
$color=$_POST['color'];
$precio_compra=$_POST['precio_compra'];
$precio_venta=$_POST['precio_venta'];
$existencia=$_POST['existencia'];
$imagen=$_FILES["imagenZapato"]["name"];
$id_proveedor=$_POST['proveedor'];
$tallas = $_POST["tallasZapato"];
$editar=$_POST["editar"];
$codigo = $_POST["codigo"];

/*imagen*/
$archivo = $_FILES["imagenZapato"]["tmp_name"]; 
$tamanio = $_FILES["imagenZapato"]["size"];
$tipo    = $_FILES["imagenZapato"]["type"];
$nombre  = $_FILES["imagenZapato"]["name"];
$fp = fopen($archivo, "rb");
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    fclose($fp); 
if($editar==="editar"){
    $sapato_e = new Zapato($codigo,$descripcion,$modelo,$color,$precio_compra,$precio_venta,$existencia,
                           $contenido, $id_proveedor);
    if ( $archivo != "" ){
        
        $data->editarSapato($sapato_e);
    }
    else{
        //echo("No hay imagen xd");
        $data->editarSapatoNoImg($sapato_e);
        //exit;
    }
    $data->deleteTallas($codigo);
    for ($i=0;$i<count($tallas);$i++)    
    {     
        $data->guardarZapatoTalla($codigo, $tallas[$i],0);    
    } 
    /*
    echo("Se debe estar editando<br>");
    echo $codigo."<br>";
    echo $descripcion."<br>";
    echo $modelo."<br>";
    echo $color."<br>";
    echo $precio_compra."<br>";
    echo $precio_venta."<br>";
    echo $existencia."<br>";
    echo $imagen."<br>";
    echo $id_proveedor."<br>";
    for ($i=0;$i<count($tallas);$i++)    
    {     
        echo "<br> Talla " . $i . ": " . $tallas[$i];    
    } 
    */
    
        header("Location: ../vista/Zapatos.php");
    exit;
}
else if($editar==="borrar"){
    $data->deleteTallas($codigo);
    $data->deleteSapato($codigo);
    header("Location: ../vista/Zapatos.php");
    exit;
}
/*
echo $descripcion."<br>";
echo $modelo."<br>";
echo $color."<br>";
echo $precio_compra."<br>";
echo $precio_venta."<br>";
echo $existencia."<br>";
echo $imagen."<br>";
echo $id_proveedor."<br>";


for ($i=0;$i<count($tallas);$i++)    
{     
echo "<br> Talla " . $i . ": " . $tallas[$i];    
} 
if(count($_FILES) > 0){
    echo "No pues si se subio";
}
else{
    echo"no jala esta madre";
}

echo "<br>";
*/



//echo"<br> <br> <br> <br> <br>Objeto zapato <br> <br> <br>";


if ( $archivo != "none" )
{
    $fp = fopen($archivo, "rb");
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    fclose($fp); 
    $sapato = new Zapato(1,$descripcion,$modelo,$color,$precio_compra,$precio_venta,$existencia,$contenido,$id_proveedor);


    $codigo_sapato=$data->guardarSapato($sapato);
    echo "codigo sapato: ".$codigo_sapato;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    for ($i=0;$i<count($tallas);$i++)    
    {     
        $data->guardarZapatoTalla($codigo_sapato, $tallas[$i],0);    
    } 
    
    //$data->guardarZapatoTalla($codigo_sapato, $tallas[0]);
    header("Location: ../vista/Zapatos.php");
}
 else
    print "No se ha podido subir el archivo al servidor";



?>