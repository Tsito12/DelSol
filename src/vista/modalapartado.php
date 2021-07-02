<?php 
   //include "conexion.php";
   include "../modelo/Data.php";
      
  
          if (empty($_SESSION['active'])) {
           header('location: Login.php');



          }
     $alert=" ";
     $error="";
      if (!empty($_POST['precioP'])) {
    
      
      $idz = $_POST['idzapato'];
      $precio = $_POST['precioP'];
      $cliente = $_POST['cliente'];
      $abono = $_POST['abono'];
      $resta = $_POST['resto'];
      $est = $_POST['Estatus'];
     
      $d = new Data();
      $error=$d->insertarApartado($idz,$cliente,$abono,$resta,$est);

        //$insert_apartado = mysqli_query($conectar," INSERT INTO apartado(codigo,Precio_p,id_cliente,ultimo_abono,saldo_restante,estatus) VALUES('$idz','$precio','$cliente','$abono','$resta','$est')");
                   


          if($error!=""){
              
              $alert = ' <p class="msg_save"> Datos correctos </p> ';
              
           
          }

          
          else{
            
            $alert = '<p class"msg_error"> Error al crear el apartado </p>';
          } 
      

  }


?>

<script type="text/javascript" src="../controlador/apartado.js"></script>

<div  class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #E4FAF0;">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLongTitle">APARTADO</h1>
        
      </div>
      <div class="modal-body">
        <form  class="form-register" action="" method="post">
     
  
    <h4>Agregar apartado</h4>
      <label>codigo de zapato</label>
     <?php 
     $d = new Data();
     $sapatos = $d->getSapatos();
      //$query_idzapato = mysqli_query($conectar,"SELECT * FROM zapato");
      //$result_idzapato=mysqli_num_rows($query_idzapato);


      ?> 


      <?php 
                              if (!empty($sapatos))
                               {
                                
                                ?>

      <select name="idzapato" class="form-control" onchange="ponerPrecioSapato(this)"id="idz">
      <option value="">Seleccione un modelo de zapato</option>
                            <?php
                                foreach($sapatos as $s) {


                                    ?>
                                  <option value="<?php echo($s->getCodigo());// $idzapato["codigo"]; ?>"> <?php
                                   echo ($s->getCodigo());//$idzapato["codigo"]; ?> -- <?php
                                   echo ($s->getModelo());  //$idzapato["modelo"]; ?> -- $<?php
                                   echo ($s->getPrecioVenta());  //$idzapato["precio_venta"]; ?>
                                   

                                    


                                   </option>
                                   
                                   <?php  
                                   }
                                    
                                         }
                              ?>
                             
                                  
      </select><br> 
   
    
      <input class="form-control" type="number" name="precioP"  id="precioP" placeholder="Ingrese el precio del producto*" maxlength="8" minlength="3" readonly Required onchange="res();"
       ><br>
       




       <label>Codigo del cliente</label>
       <?php 
                    $d = new Data();
                    $clientes = $d->getClientes();
                    //$query_idcliente = mysqli_query($conectar,"SELECT * FROM cliente");
                    //$result_idcliente=mysqli_num_rows($query_idcliente);
                      

        ?>
                  <select name="cliente" class="form-control" id="" >
                            <?php 
                              if (!empty($clientes))
                               {
                                //while ($idclientes =mysqli_fetch_array($query_idcliente) ) {
                                  foreach($clientes as $c){


                                    ?>
                                  <option value="<?php echo ($c->getIdCliente()); //$idclientes["id_cliente"]; ?>"> <?php
                                   echo ($c->getIdCliente()); ///$idclientes["id_cliente"]; ?>--<?php echo ($c->getNombreCliente()); //$idclientes["nombre_cliente"];  ?></option>
                                  <?php  
                                   }
                              }
                              ?>
                          </select><br> 


       <input class="form-control" type="number" name="abono" id="abono" placeholder="Ingrese el abono*"  Required onchange="res();"
       ><br>
       
     <input class="form-control" type="number" id="result" name="resto"  minlength="3"  maxlength="8"  placeholder="Ingrese el saldo restante*"  readonly/><br>

                                   
                                
                         


     <select name="Estatus" class="form-control">
     <option value="Pendiete">No liquidado</option>
     <option value="Liquidado">Liquidado</option>
     </select><br>


     
      <div ><?php echo isset($alert) ? $alert : ''; ?></div>
      <div ><?php echo isset($error) ? $error : ''; ?></div>
      <input class="btn  btn-primary" type="submit" value="Agregar"> |
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
  
 </form>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>