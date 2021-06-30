<?php 
   //include "conexion.php";
   require_once "../modelo/Data.php";
   $d = new Data();
      session_start();
  
          if (empty($_SESSION['active'])) {
           header('location: Login.php');



          }
     $alert=" ";
     $error="";
      if (!empty($_POST)) {
    
      
      $idempleado = $_POST['id_empleado'];
      $idcajero = $_POST['idcajero'];
      $numcajero = $_POST['num_cajero'];
      $cajero=null;
      $cajero = $d->getCajero($idempleado,$idcajero);

      //$queri = mysqli_query($conectar, "SELECT id_empleado,id_cajero,num_caja FROM cajero WHERE id_cajero = '$idcajero'");

      //$result = mysqli_fetch_array($queri);
      //if($result>0){
      if(($cajero->getIdCajero())!=null){

        $alert = '<p class"msg_error"> El el cajero ya existe </p>';

      }else{
        $error = $d->agregarCajero($idempleado,$idcajero,$numcajero);
        //$insert_cajero = mysqli_query($conectar," INSERT INTO cajero(id_empleado, id_cajero, num_caja) VALUES('$idempleado','$idcajero','$numcajero')");
                    
                    

          if($error==""){
              
              $alert = ' <p class="msg_save"> Datos correctos </p> ';
              
           
          }

          
          else{
            
            $alert = '<p class"msg_error"> Error al crear el cajero </p>';
          } 
      }

  }


?>                               

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="../Style/edicss.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

      <title>Agregar Cajero</title>
      
  </head>
<body style=" background:   #C5FEFE; ">
   <form  class="form-register" action="" method="post">
     <div class="tit" ><h1  class="text-center">CAJERO</h1></div>
  
    <h4>Agregar Cajero</h4>
        <?php 
        require_once "../modelo/Data.php";
        $d = new Data();
        $empleados = $d->getEmpleados();
        /*
                    $query_idempleado = mysqli_query($conectar,"SELECT * FROM empleado");
                    $result_idemplead=mysqli_num_rows($query_idempleado);
                      */

        ?>
                  <select name="id_empleado" class="form-control" id="rol">
                            <?php 
                            foreach($empleados as $e){
                              echo"<option value=\"".$e->getIdEmpleado()."\">".$e->getNombreEmpleado()." ".
                              $e->getApellido1Empleado()." ".$e->getApellido2Empleado()."</option>";
                            }
                            /*
                              if ($result_idemplead >0)
                               {
                                while ($idempleado =mysqli_fetch_array($query_idempleado) ) {


                                    ?>
                                  <option value="<?php echo $idempleado["id_empleado"]; ?>"> <?php
                                   echo $idempleado["id_empleado"]; ?>--<?php echo $idempleado["puesto"] ?></option>
                                  <?php  
                                   }
                              }*/
                              ?>
                          </select><br> 
       <input class="controls" type="text" name="idcajero" id="dcajero" placeholder="Ingrese el el Id de caja*" pattern="([0-9]{1,7})" Required 
       >
       <input class="controls" type="text" name="num_cajero" id="numcajero" placeholder="Ingrese el numero de caja*" pattern="([0-9]{1,5}" Required 
       >
       <div ><?php echo isset($alert) ? $alert : ''; ?></div>
      <input class="btn  btn-primary" type="submit" value="Agregar"> |
      <a href="caja-admin.php" class="btn  btn-primary" type="submit">    Cerrar    </a>

  
 </form>
</body>
</html>