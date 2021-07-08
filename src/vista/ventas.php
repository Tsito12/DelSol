<?php

//include "conexion.php";
//require_once "../modelo/Data.php";

 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Ventas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
   

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../Style/ventas.css">
    
   <style type="text/css">
     .table-responsive{
      padding: 0.5em;
      

 
 }
   </style>
 

 
   


</head>
<body >
    <div class="wrapper">
      <?php include "menulateral.php"; ?>

     <div class="main_content container-responsive">
            
            
                
               <div class="container p-5">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> <a href="../controlador/salir.php">
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
               </div>     

                    <div class=" col-12">
                        <img src="../imgZ/bienes.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>VENTAS</p>
                    </div>

                    
                     <br>
                     <br>
                     <br>
                      <div class="datos_cliente">
                        <div class="action_cliente">
                          <h4> Datos del cliente </h4>
                          
                          <a href="" data-toggle="modal" data-target="#exampleModalCenterC" class="btn btn_new_cliente btn-outline-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Nuevo cliente</a>
                          <a href="" data-toggle="modal" data-target="#exampleModalCliente" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Listado de cliente</a>
                          <?php include "modalAgregarC.php"; ?>
                          <?php include "modalClientes.php"; ?>
                        </div>
                        <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos">
                          <!--<input type="hidden" name="action" value="addCliente">
                          <input type="hidden" id="idcliente" name="idcliente" value="" required="">  -->
                          <div class="wd30">
                            <label>Nit</label><br>
                            <input type="text" name="nit_cliente" id="nit_cliente">
                          </div>
                          <div class="wd30">
                            <label>Nombre del cliente</label><br>
                            <input type="text" name="nom_clinte" id="nom_cliente" disabled required>
                          </div>
                          <div class="wd30">
                            <label>Direccion</label><br>
                            <input type="text" name="dir_clinte" id="dir_cliente" disabled required>
                          </div>
                           <div class="wd30">
                            <label>Telefono</label><br>
                            <input type="text" name="tel_clinte" id="tel_cliente" disabled required>
                          </div>
                          <div class="wd30">
                            <label>Correo Electronico</label><br>
                            <input type="email" name="cor_clinte" id="cor_cliente" disabled required>
                          </div>
                          <div id="div_registro_cliente" class="wd100"><br>
                           <!--<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>-->
                          </div>
                        </form>


                      
                      
                      <div class="datos_venta">
                         <h4>Datos de venta</h4>
                         <div class="datos">
                          <div class="wd50">
                            <label><?php echo $_SESSION['puesto']; ?></label>
                            <p><?php echo $_SESSION['Nombre']; ?>  <?php echo $_SESSION['Ape1']; ?></p>
                            <p class="d-none" id="idEmpleado"><?php echo $_SESSION['idEmp']; ?></p>
                          </div>
                          <div class="wd50">
                          <?php include "modalZapatos.php"; ?>
                            <label>Acciones</label>
                            <div id="acciones_venta">
                              <a class="btn btn-danger" id="btn_anular_venta" onclick="anular()"><i class="fa fa-trash" aria-hidden="true"></i> Anular</a>
                              <a class="btn btn-warning" id="btn_facturar_venta" style="display:none ;"><i class="fa fa-check-square-o" aria-hidden="true"></i> Procesar </a>
                              <a href="Apartado.php" type="button" class=" btn btn-outline-primary ">  Apartado </a>
                              <a href="" type="button" data-toggle="modal" data-target="#exampleModalZapato" class=" btn btn-outline-primary ">  Lista de zapatos </a>
                            </div>
                          </div>
                   
                         </div>
                      </div>
                       <div class="table-responsive">
                        <table class="table table-hover">
                              <thead >
                                <tr class="thead-dark" >
                                  <th width="50px">codigo</th>
                                  <th>Modelo</th>
                                  <th >Descripcion</th>
                                  <th >Existencia</th>
                                  <th  >Cantidad</th>
                                  <th class="textright">Precio</th>
                                  <th class="textright">Precio Total</th>
                                  <th class="textright">Accion</th>
                                </tr>
                                <tr> 
                                      
                                      <th><input type="text" name="tex_cod_producto" id="tex_cod_producto"></th>
                                      <th id="text_Modelo">-</th>
                                      <th id="text_decripcion">-</th>
                                      <th id="text_existencia">-</th>
                                      <th><input type="text" class="col-6" name="text_cant_producto" id="text_cant_producto" value="0" min="1" max="4" maxlength="4" disabled></th>
                                      <th id="text_precio" class="textright">0.00</th>
                                      <th id="text_precio_total" class="textright">0.00</th>
                                      <th><a  id="add_product_venta" class="btn btn-primary">Agregar</a></th>
                                     
                                                               
                                       
                                </tr>
                                <tr class="thead-dark " >
                                  <th >Codigo</th>
                                  <th>Modelo</th>
                                  <th >Descripcion</th>
                                  <th  >Cantidad</th>
                                  <th >Precio</th>
                                  <th >Precio Total</th>
                                  <th colspan="2">Accion</th>
                                 
                                </tr>
                              </thead>
                              <tbody id="detalle_ventas">
                                
                              </tbody>
                              
                              <tfoot id="detalle_totales">
                                <!-- aqui va codigo ajax-->
                                
                              </tfoot>
                              
                            </table>
                            <label class="col-12" id="subtotal"></label>
                            <label class="col-12" id="iva"></label>
                            <label class="col-12" id="total"></label>
                            <label class="col-12" id="error"></label>
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
        <!--<script type="text/javascript" src="../controlador/functios.js"></script>-->
        <script type="text/javascript" src="../controlador/ventas.js"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    
     <script type="text/javascript">    
  
        $(document).ready(function(){
        var usuarioid = '<?php echo $_SESSION['idEmp']; ?>';
        //serchForDetalle(usuarioid);

       });
      </script>
      <script src="../controlador/paginator.js"></script>

</body>
</html>