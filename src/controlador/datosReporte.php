<?php
require_once "../modelo/Data.php";

$d = new Data();
$periodo = $_POST['periodo'];

$acccion = $_POST['accion'];

if($acccion=="vendidos"){
    $res = $d->ventaDeZapatos($periodo);
    while($reg = mysqli_fetch_array($res)){
        echo("<tr>");
        echo("<td>".$reg[0]."</td>");
        echo("<td>".$reg[1]."</td>");
        echo("<td>".$reg[2]."</td>");
        echo("<td>".$reg[3]."</td>");
        echo("</tr>");
    }
}
elseif($acccion == "noVendidos"){
    $res = $d->zapatosNoVendidos($periodo);
    while($reg = mysqli_fetch_array($res)){
        echo("<tr>");
        echo("<td>".$reg[0]."</td>");
        echo("<td>".$reg[1]."</td>");
        echo("<td>".$reg[2]."</td>");
        echo("<td>".$reg[3]."</td>");
        echo("</tr>");
    }
}

?>