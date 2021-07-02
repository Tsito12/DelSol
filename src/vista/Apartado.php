<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Apartado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
   

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/Ausuario.css">



</head>
<body >
    <div class="wrapper">
      <?php include "menulateral.php"; ?>
     <div class="main_content container-responsive">
            
            <div class="cuerpo" style="">
                
               <div class="container p-5">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> <a href="salir.php">
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/zapatillas.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>Apartado</p>
                    </div>

                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-6"><br>
                        <form action="buscarApar.php" method="get" class="form-control">
                            <div class="responsive input-group">
                                <input type="text" name="busqueda" class="form-control" placeholder="Buscar">
                                <input type="submit"  class="input-group-addon btn btn-outline-primary " value="Buscar"> 

                                

                                <a href="" type="button" class=" btn btn-outline-primary " data-toggle="modal" data-target="#exampleModalCenter" > <i class="fa fa-plus" aria-hidden="true"></i> Agregar </a>
                                
                                    
                                
                            </div>
                            
                          </form>
                             <?php include "modalapartado.php"; ?>
                            <br>
                       
                          </div>

                    <div class="col-12 col-md-12"></div>
                      <div class="col-12 col-md-12 tit">
                       <h1>Contenido<h1>
                      </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                              <thead class="thead-dark ">
                                <tr >
                                  <th scope="col">Id de Apartado</th>
                                  <th scope="col">Codigo</th>
                                  <th scope="col">Precio del Producto</th>
                                  <th scope="col">Id cliente</th>
                                  <th scope="col">Ultimo abono</th>
                                  <th scope="col">Saldo restante</th>
                                  <th scope="col">Estatus</th>
                                  
                                  <th scope="col">Opciones</th>
                                  <th scope="col">        </th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                                
                                  <?php
                                  //require_once "../modelo/Data.php";
                                    $d = new Data();
                                    $apartados = $d->getApartados();
                                    //var_dump($apartados);
                                    //$query =mysqli_query($conectar,"SELECT * FROM apartado" );
                                    //$result = mysqli_num_rows($query);
                                    $error="";
                                    if($apartados!=null){
                                      //$error="SI hay apartados";
                                      //print("Si hay apartados xd");
                                      //while ($data = mysqli_fetch_array($query) ) {
                                        foreach($apartados as $a){
                                          $sapatoApartado = $d->getSapato($a->getCodigo());
                                        
                                    ?>
                                  <tr> 
                                      
                                      <td>A<?php echo ($a->getIdApartado());//$data['id_apartado']; ?></th>
                                        <td><?php echo ($a->getCodigo());//$data['codigo'];?></td>
                                      <td ><?php echo ($sapatoApartado->getPrecioVenta());//$data['Precio_p'];?></td>
                                      <td><?php echo ($a->getIdCliente());//$data['id_cliente'];?></td>
                                      <td><?php echo ($a->getUltimoAbono());//$data['ultimo_abono'];?></td>


                                      <td><?php echo ($a->getSaldoRestante());//$data['saldo_restante'];?></td>

                                     
                                      
                                      <td>
                                        
                                        <?php echo ($a->getStatus());//$data['estatus'];?>
                                        
                                        </td>
                                      

                                      
                                                                       
                                      <td>
                                        <?php
                                        if (($a->getUltimoAbono()) != ($sapatoApartado->getPrecioVenta())) {
                                          
                                        
                                        ?>
                                        <a href="abonarA.php?id=<?php echo $a->getIdApartado();//$data['id_apartado']; ?> " type="button" class="btn btn-warning " ><i class="fa fa-pencil" aria-hidden="true"></i> Abonar</a>
                                      <?php }

                                          ?>
                                       
                                      </td>
                                    <?php }?>

                                       
                                </tr>
                                 <?php
                                
                                }
                                else{
                                  $error="No salen los apartados";
                                }

                              ?>

                                
                              </tbody>
                            </table>
                           
                           
                    </div>
                    <div class="col-12"><br></div>
                     <div class="col-12" style="text-align: center;" >
                               <a href="listadocliente.php" type="button" class=" btn btn-primary "  >  Listado de cliente </a>
                    </div>
                    <div id="jsjs"><?php echo isset($error) ? $error : ''; ?></div>  

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