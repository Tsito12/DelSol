<?php 
   //include "conexion.php";
    require_once "../modelo/Data.php";
      session_start();
  
          if (empty($_SESSION['active'])) {
           header('location: Login.php');



          }
       if (!empty($_POST['nombre']))
       {

       $alert=" ";
       $error="";
        $id = $_POST['id'];
        $nom = $_POST['nombre'];
        $dir = $_POST['direccion'];
        $tel = $_POST['telefono'];
        $cor = $_POST['correo'];
        
        $d = new Data();
        $error = $d->editarCliente($id, $nom, $dir, $tel, $cor);
        
              //$sql_update =  mysqli_query($conectar, "UPDATE cliente  SET nombre_cliente = '$nom', direccion_cliente = '$dir', telefono_cliente= '$tel', correo_cliente = '$cor' WHERE id_cliente = '$id'");
        
        

       
          if($error!=""){
            
            $alert = ' <p class="msg_save"> Datos actualizaados correctos </p> ';
          }else{
            
            $alert = '<p class"msg_error"> Error al actualizar  el cliente </p>';
          } 

      }

   
  

  //mostrar datos
   if (empty($_POST['idc'])) {
      header('Location: listadocliente.php');
    }
    $iduser = $_POST['idc'];
    $d = new Data();
    $cliente = $d->getCliente($iduser);
    /*
    $sql_a = mysqli_query($conectar,"SELECT id_cliente,Nit,nombre_cliente,direccion_cliente,telefono_cliente,correo_cliente
      FROM cliente WHERE id_cliente = $iduser ");

    $result_sql = mysqli_num_rows($sql_a);
    */
    //if ($result_sql == 0) {
      if($cliente->getIdCliente()==null){
      header('Location: listadocliente.php');

    }else{
      $option = '';
      /*
      while ($data = mysqli_fetch_array($sql_a)) {
        # code...
        $id = $data['id_cliente'];
        $nit = $data['Nit'];
        $nom = $data['nombre_cliente'];
        $dir = $data['direccion_cliente'];
        $tel = $data['telefono_cliente'];
        $cor = $data['correo_cliente'];
        */
        $id = $cliente->getIdCliente();
        $nom = $cliente->getNombreCliente();
        $dir = $cliente->getDireccionCliente();
        $tel = $cliente->getTelefonoCliente();
        $cor = $cliente->getCorreoCliente();
       
         
            
          //}
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
                      
      </script>
      
      

      <title>Clientes Actualizar</title>

      
      
  </head>
<body style=" background:   #C5FEFE; ">
   <form  class="f form-register" action="" method="post">
     <div class="tit" ><h1  class="text-center">ABONAR</h1></div>
  
    <h4>Abono al Apartado</h4>
      <input  type="hidden"  name="id" value="<?php echo $iduser?>" />
   
    <label>Nombre</label>
      <input class="form-control" type="text" name="nombre" value="<?php echo $nom; ?>"  /><br>
         
     
      <label>Direccion</label>
       <input class="form-control" type="text" name="direccion" value="<?php echo $dir; ?>"  
       /><br>
      <label>Telefono</label> 
     <input class="form-control"  name="telefono" type="text" value="<?php echo $tel; ?>"  /><br>

     <label>Correo</label>
     <input class="form-control" type="text" name="correo" value="<?php echo $cor; ?>"  /><br>

        
      

      <div ><?php echo isset($alert) ? $alert : ''; ?></div>
      <div ><?php echo isset($error) ? $error : ''; ?></div>
      <input class="btn  btn-primary" type="submit" value="Aceptar"> |
      <a href="listadocliente.php" class="btn  btn-primary" type="submit" > Cerrar </a>

  
 </form>
</body>
</html>

