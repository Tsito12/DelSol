  <?php 
   //include "conexion.php";
  require_once "../modelo/Data.php";
      session_start();
      $d = new Data();
          if (empty($_SESSION['active'])) {
           header('location: Login.php');



          }
      //else if (!empty($_POST))
      else if (!empty($_POST['nombre']))
       {

       $alert=" ";
       $basura = " ";
       $error = " ";
        $id = $_POST['id'];
        $nom = $_POST['nombre'];
        $ape1 = $_POST['ape1'];
        $ape2 = $_POST['ape2'];
        $sexo = $_POST['sexo'];
        $edad = $_POST['edad'];
        $rfc = $_POST['rfc'];
        $sueldo = $_POST['sueldo'];
        $puesto = $_POST['puesto'];
        $user = $_POST['user'];

        //$empleado = new Empleado($id,$nom,$ape1,);
       
// (nombreU = '$nombre' and idUsuario != $idUsuario) on
      /*
      $query = mysqli_query($conectar, "SELECT * FROM usuario 
                                WHERE   usuario = '$user' AND id_empleado != $id");
      
      $result = mysqli_fetch_array($query);
      */
      $usr = $d->selectUsuario($user,$id);
      if($usr->getIdEmpleado()!=null){

        $alert = '<p class"msg_error"> El nombre o usuario ya existe </p>';

      }else{
        if (empty($_POST['pass'])) {
          //$basura='<p>Esta editando</p>';
          $error = $d->updateUsuario($nom,$ape1,$ape2,$sexo,$edad,$rfc,$sueldo,$puesto,$user,$id);
          //$sql_update =  mysqli_query($conectar, "UPDATE empleado e INNER JOIN usuario u ON u.id_empleado = e.id_empleado  SET e.nombre_empleado = '$nom', e.apellido1_empleado = '$ape1', e.apellido2_empleado= '$ape2', e.sexo = '$sexo', e.edad = '$edad',e.rfc_empleado='$rfc',e.sueldo_base ='$sueldo', e.puesto = '$puesto', u.usuario = '$user' WHERE e.id_empleado = '$id'");

        }else{
            //$sql_update =  mysqli_query($conectar, "UPDATE empleado e INNER JOIN usuario u ON u.id_empleado = e.id_empleado  SET e.nombre_empleado = '$nom', e.apellido1_empleado = '$ape1', e.apellido2_empleado= '$ape2', e.sexo = '$sexo', e.edad = '$edad',e.rfc_empleado='$rfc',e.sueldo_base ='$sueldo', e.puesto = '$puesto', u.usuario = '$user' WHERE e.id_empleado = '$id'");
        }

       
          if($error==""){
            
            $alert = ' <p class="msg_save"> Datos actualizados correctos </p> ';
          }else{
            
            $alert = '<p class"msg_error"> Error al actualizar  el usuario </p>';
          } 
      }

  } 
  

  //mostrar datos
   if (empty($_POST['id'])) {
      header('Location: Usuario-administrador.php');
    }
    $iduser = $_POST['id'];
    /*
    $sql_a = mysqli_query($conectar,"SELECT e.id_empleado,e.nombre_empleado,e.apellido1_empleado,e.apellido2_empleado,e.sexo,e.edad,e.rfc_empleado,e.sueldo_base, e.puesto ,u.usuario
      FROM empleado e INNER JOIN usuario u on e.id_empleado = u.id_empleado WHERE e.id_empleado = $iduser ");

    $result_sql = mysqli_num_rows($sql_a);
    */
    //$d = new Data();
    $emp = $d->getEmpleadoU($iduser);
    //if ($result_sql == 0) {
      if(empty($emp)){
      header('Location: Usuario-administrador.php');

    }else{
      $option = '';
      /*
      while ($data = mysqli_fetch_array($sql_a)) {
        # code...
        
        $id = $data['id_empleado'];
        $nom = $data['nombre_empleado'];
        $ape1 = $data['apellido1_empleado'];
        $ape2 = $data['apellido2_empleado'];
        $sexo = $data['sexo'];
        $edad = $data['edad'];
        $rfc = $data['rfc_empleado'];
        $sueldo = $data['sueldo_base'];
        $puesto = $data['puesto'];
        $usu = $data['usuario'];
        
        
         
            
          }
          */
          $id = $emp->getIdEmpleado();
          $nom = $emp->getNombreEmpleado();
          $ape1 = $emp->getApellido1Empleado();
          $ape2 = $emp->getApellido2Empleado();
          $sexo = $emp->getSexo();
          $edad = $emp->getEdad();
          $rfc = $emp->getRfcEmpleado();
          $sueldo = $emp->getSueldoBase();
          $puesto = $emp->getPuesto();
          $usu = $emp->getUsuario();
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

      <title>Editar Usuario</title>
      
  </head>
<body style=" background:   #C5FEFE; ">
   <form  class="form-register" action="" method="post">
     <div class="tit" ><h1  class="text-center">USUARIO</h1></div>
  
    <h4>Editar Usuario</h4>
      <input  type="hidden"  name="id" value="<?php echo $iduser; ?>" 
       >

      <input class="controls" type="text" name="nombre" id="nombres" placeholder="Ingrese su nombre" pattern="([aA-zZ]{1,15})" Required 
       value="<?php echo $nom; ?>">
       <input class="controls" type="text" name="ape1" id="apellido11" placeholder="Ingrese el primer apellido" pattern="([aA-zZ]{1,15})" Required value="<?php echo $ape1; ?>"
       >
       <input class="controls" type="text" name="ape2" id="apellido22" placeholder="Ingrese el segundo apellido" pattern="([aA-zZ]{1,15}" Required value="<?php echo $ape2; ?>" />
       <input  name="sexo" class="form-control" value="<?php echo $sexo; ?>"> <br>
          

     
     <input class="controls" type="number" name="edad"  min="18" max="100" placeholder="Ingrese la edad" pattern="([0-9]{1,3}" required value="<?php echo $edad; ?>" >
     <input class="controls" type="text" name="rfc"  placeholder="Ingrese el RFC del Empleado"  required="" value="<?php echo $rfc; ?>" >
     <input class="controls" type="number" name="sueldo"  min="0" max="10000" pattern="([0-9]{1,3}" placeholder="Ingrese el sueldo base del empleado" required value="<?php echo $sueldo; ?>">
     

                    
     <input name="puesto" class="form-control" id="rol" value="<?php echo $puesto; ?>">
                      
          <br> 
      <input class="controls" type="text" name="user"  placeholder="Usuario*" pattern="[A-Za-z0-9]{5,20}" minlength="5" maxlength="20" required="obligatorio" value="<?php echo $usu; ?>" >
      
      <br>
      <div ><?php echo isset($alert) ? $alert : ''; ?></div>
      <div ><?php echo isset($basura) ? $basura : ''; ?></div>
      <div ><?php echo isset($error) ? $error : ''; ?></div>
      <input class="btn  btn-primary" type="submit" value="Aceptar"> |
      <a href="Usuario-administrador.php" class="btn  btn-primary" type="submit" > Cerrar </a>

  
 </form>
</body>
</html>