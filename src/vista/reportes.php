<?php
//include "conexion.php";
require_once "../modelo/Data.php";
                                             
                                      
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Reportes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
   

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/Ausuario.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


</head>

<body >
    <div class="wrapper">
      <?php include "menulateral.php"; ?>
     <div class="main_content container-responsive">
            
            <div class="cuerpo" style="">
                
               <div class="container p-5">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> <a href="../controlador/salir.php">
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/documento.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>Reportes</p>
                    </div>

                   
                        
                    <div class="col-6 col-md-6"></div>
                      <div class="col-12 col-md-12 tit">
                       <h1>Contenido<h1>
                      </div>
                    <div class="col-6">
                        <h4 class="text-center">Apartados Liquidados</h4> 
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead class="thead-dark ">
                                <tr >
                                  <th scope="col">Id de Apartado</th>
                                  <th scope="col">id_cliente</th>
                                  <th scope="col">Nombre del cliente</th>
                                  <th scope="col">Codigo</th>
                                  <th scope="col">Modelo</th>
                                  <th scope="col">Precio del producto</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                                
                                  <?php
                                    $d = new Data();
                                    $query =mysqli_query(($d->getConexion()->getCon()),"SELECT a.id_apartado,c.id_cliente,c.nombre_cliente,z.codigo,z.modelo,z.precio_venta FROM apartado a INNER JOIN cliente c ON a.id_cliente = c.id_cliente INNER JOIN zapato z ON a.codigo = z.codigo WHERE a.estatus = 'Liquidado' order by id_apartado" );
                                    $result = mysqli_num_rows($query);
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                  <tr> 
                                      
                                      <td><?php echo $data['id_apartado']; ?></th>
                                      <td ><?php echo $data['id_cliente'];?> </td>
                                      <td><?php echo $data['nombre_cliente'];?></td>
                                      <td><?php echo $data['codigo'];?></td>
                                      <td><?php echo $data['modelo'];?></td>
                                      <td><?php echo $data['precio_venta'];?></td>
                                                                          
                                                                             
                                </tr>
                                <?php
                                 }
                                
                                }


                              ?>
                                
                              </tbody>
                              <tfoot>
                                <?php 
                                $query =mysqli_query(($d->getConexion()->getCon()),"SELECT count(id_apartado) AS Total FROM `apartado` WHERE estatus = 'Liquidado'" );
                                    $result = mysqli_num_rows($query);
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                 
                                  <tr>
                                      <td colspan="5">Total de apartados liquidados
                                      </td>
                                      <td class="text-center"><?php echo $data['Total'];?></td>
                                  </tr>
                              <?php }
                              } ?>
                                    <?php 
                                        $query =mysqli_query(($d->getConexion()->getCon()),"SELECT sum(precio_venta) AS Total FROM `apartado` inner join zapato on apartado.codigo = zapato.codigo WHERE estatus = 'Liquidado'
                                            " );
                                    $result = mysqli_num_rows($query);
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                    <tr>
                                        <td colspan="5">Total Generado</td>
                                        <td class="text-center">$ <?php echo $data['Total'];?></td>
                                    </tr>
                                     <?php }
                              } ?>
                              </tfoot>
                            </table>

                            <div class="text-center">
                                <a href="apartadoL.php" class="btn btn-primary" target="_blank">Generar PDF</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="text-center">Apartados No liquidados</h4> 
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead class="thead-dark ">
                                <tr >
                                  <th scope="col">Id de Apartado</th>
                                  <th scope="col">id_cliente</th>
                                  <th scope="col">Nombre del cliente</th>
                                  <th scope="col">Codigo</th>
                                  <th scope="col">Modelo</th>
                                  <th scope="col">Precio del producto</th>
                                  <th scope="col">Saldo Restante</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                                
                                  <?php
                                    $query =mysqli_query(($d->getConexion()->getCon()),"SELECT a.id_apartado,c.id_cliente,c.nombre_cliente,z.codigo,z.modelo,z.precio_venta,a.saldo_restante FROM apartado a INNER JOIN cliente c ON a.id_cliente = c.id_cliente INNER JOIN zapato z ON a.codigo = z.codigo WHERE a.estatus = 'Pendiente' order by id_apartado" );
                                    $result = mysqli_num_rows($query);
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                  <tr> 
                                      
                                      <td><?php echo $data['id_apartado']; ?></th>
                                      <td ><?php echo $data['id_cliente'];?> </td>
                                      <td><?php echo $data['nombre_cliente'];?></td>
                                      <td><?php echo $data['codigo'];?></td>
                                      <td><?php echo $data['modelo'];?></td>
                                      <td><?php echo $data['precio_venta'];?></td>
                                      <td><?php echo $data['saldo_restante'];?></td>
                                                                          
                                                                             
                                </tr>
                                <?php
                                 }
                                
                                }


                              ?>
                                
                              </tbody>
                              <tfoot>
                                <?php 
                                $query =mysqli_query(($d->getConexion()->getCon()),"SELECT count(id_apartado) AS Total FROM `apartado` WHERE estatus = 'Pendiente'" );
                                    $result = mysqli_num_rows($query);
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                 
                                  <tr>
                                      <td colspan="6">Total de apartados no liquidados
                                      </td>
                                      <td class="text-center"><?php echo $data['Total'];?></td>
                                  </tr>
                              <?php }
                              } ?>
                                    <?php 
                                        $query =mysqli_query(($d->getConexion()->getCon()),"SELECT sum(precio_venta) AS Total FROM `apartado`inner join zapato on apartado.codigo = zapato.codigo WHERE estatus = 'Pendiente'
                                            " );
                                    $result = mysqli_num_rows($query);
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                    <tr>
                                        <td colspan="6">Total Generado</td>
                                        <td class="text-center">$ <?php echo $data['Total'];?></td>
                                    </tr>
                                     <?php }
                              } ?>
                              </tfoot>
                            </table>

                            <div class="text-center">
                                <a href="apartadoNL.php" class="btn btn-primary" target="_blank">Generar PDF</a>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="text-center">
                                <a href="ReporteVentas.php" class="btn btn-primary">Reporte de ventas</a>
                            </div>
            </div>
            
            </div>
         
        </div>
 </div>
     
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
     
 

</body>
</html>