<?php 
   //include "conexion.php";
    require_once "../modelo/Data.php";
  
          if (empty($_SESSION['active'])) {
           header('location: Login.php');



          }else{
     $alert=" ";
     $error="";
      if (!empty($_POST['nombre'])) {
    
      
      //$nit = $_POST['nit'];
      $nom = $_POST['nombre'];
      $dir = $_POST['dir_clinte'];
      $tel = $_POST['tel_clinte'];
      $cor = $_POST['cor_clinte'];
      
      $d = new Data();

      $error = $d->insertarCliente($nom,$dir,$tel,$cor);
      
    

        //$insert_cliente = mysqli_query($conectar," INSERT INTO cliente(Nit,nombre_cliente,direccion_cliente,telefono_cliente,correo_cliente) VALUES('$nit','$nom','$dir','$tel','$cor')");
                   


        }
}

?>






<div  class="modal fade" id="exampleModalCenterC" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #E4FAF0;">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLongTitle">CLIENTE</h1>
        
      </div>
      <div class="modal-body">
        <form  class="form-register" action="" method="post">
     
  
        <h4>Agregar Cliente</h4>
      
        <!--<input class="form-control" type="numeric" name="nit"  placeholder="Ingrese el nit del cliente*" pattern="[0-9]{1,8}" required /><br>-->
           
         <input class="form-control" type="text"  name="nombre"   placeholder="Ingrese el nombre del cliente*"  required /><br>

         <input class="form-control" type="text" name="dir_clinte" placeholder="Ingrese la direccion del cliente*" required> <br>

         <input class="form-control" type="text" name="tel_clinte"  placeholder="Ingrese el telefono del cliente*" pattern="951[0-9]{7}" required><br>

         <input type="email" class="form-control" name="cor_clinte"  placeholder="Ingrese el correo del cliente" required><br>

                                   
     

     
      
      <input class="btn  btn-primary" type="submit" value="Aceptar"> |
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  
  
 </form>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div>
  </div>
</div>