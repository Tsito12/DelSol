<?php
//include "conexion.php";
require_once "../modelo/Data.php";
$d = new Data();
/*
$periodo = $_GET['periodo'];
switch($periodo){
  case "mes":
      $fecha = date("n");
      $query = "SELECT z.codigo, descripcion, razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                proveedor p on z.id_proveedor = p.id_proveedor 
                where MONTH(fecha)=$fecha group by codigo order by vendidos desc";
      break;
  case "year":
      $fecha = date("Y");
      $query = "SELECT z.codigo, descripcion,razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                proveedor p on z.id_proveedor = p.id_proveedor 
                where YEAR(fecha)=$fecha group by codigo order by vendidos desc";
      break;
  case "all":
      $fecha = "";
      $query = "SELECT z.codigo, descripcion,razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                proveedor p on z.id_proveedor = p.id_proveedor 
                group by codigo order by vendidos desc";
      break;
  case "semana":
      $fecha = date("W");
      $query = "SELECT z.codigo, descripcion,razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                  zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                proveedor p on z.id_proveedor = p.id_proveedor 
                  where WEEK(fecha)=$fecha group by codigo order by vendidos desc";
      break;
}
*/

$query = "SELECT z.codigo, descripcion,razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                proveedor p on z.id_proveedor = p.id_proveedor 
                group by codigo order by vendidos desc";
                
//$sql = "SELECT COUNT(id_apartado) AS liquidado, (SELECT COUNT(id_apartado) AS No_liquidado FROM apartado WHERE (estatus = 'Pendiente')) AS No_liquidado FROM apartado AS Liquidado WHERE (estatus = 'Liquidado')";
$res = ($d->getConexion()->getCon())->query($query);





  ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Descripcion', 'Cantidad venidos'],
          
          <?php
            while ($fila = $res->fetch_assoc()) {
              echo "['".$fila["descripcion"]."',";
              echo "".$fila["vendidos"]."],
              ";
            }


            ?>

            
           
           
        
          
        ]);
        console.log(data);

        var options = {
          title: 'Zapatos vendidos por <?php echo($periodo);?>'
        };

        var chart = new google.visualization.BarChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 500px; height: 500px;"></div>
  </body>
</html>
