<?php
//include "conexion.php";
require_once "../modelo/Data.php";
$d = new Data();
$sql = "SELECT COUNT(id_apartado) AS liquidado, (SELECT COUNT(id_apartado) AS No_liquidado FROM apartado WHERE (estatus = 'Pendiente')) AS No_liquidado FROM apartado AS Liquidado WHERE (estatus = 'Liquidado')";
$res = ($d->getConexion()->getCon())->query($sql)





  ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Liquidado', 'No liquidado'],
          
          <?php
            while ($fila = $res->fetch_assoc()) {
              echo "['Liquidado',".$fila["liquidado"]."],
                     ";
              echo "['No liquidado',".$fila["No_liquidado"]."],
                     ";
            }


            ?>

            
           
           
        
          
        ]);

        var options = {
          title: 'Gráfica de apartado',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 500px; height: 500px;"></div>
  </body>
</html>
