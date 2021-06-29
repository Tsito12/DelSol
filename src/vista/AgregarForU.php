  <?php 
   //include "conexion.php";
   require_once "../modelo/Data.php";
      session_start();
      $d = new Data();
  
          if (empty($_SESSION['active'])) {
           header('location: Login.php');



          }
     $alert=" ";
     $error=" ";
      if (!empty($_POST)) {
    
      
      $nombre = $_POST['nombre'];
      $apellido1 = $_POST['apellido1'];
      $apellido2 = $_POST['apellido2'];
      $sexo = $_POST['sexo'];
      $edad = $_POST['edad'];
      $rfc = $_POST['rfc'];
      $sueldo = $_POST['sueldo'];
      $puesto = $_POST['puesto'];
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      //$pas = md5($_POST['pass']);

      $empleado = $d->selectUsuario($user, $nombre);
      /*
      $queri = mysqli_query($conectar, "SELECT e.nombre_empleado, e.apellido1_empleado,e.apellido2_empleado,e.sexo,e.edad,e.rfc_empleado, e.sueldo_base,e.puesto,e.Estatus,u.id_empleado, u.usuario, u.contraseña FROM empleado e INNER JOIN usuario u on e.id_empleado = u.id_empleado WHERE e.nombre_empleado = '$nombre' OR u.usuario = '$user'");

      $result = mysqli_fetch_array($queri);
      */
      //if($result>0){
        if($empleado->getIdEmpleado()!=null){

        $alert = '<p class"msg_error"> El nombre o usuario ya existe </p>';

      }else{
        $error=$d->guardarEmpleado($nombre,$apellido1,$apellido2,$sexo,$edad,$rfc,$sueldo,$puesto);
        $id_empleado = $d->getIdEmpleado();
        $error.=$d->guardarUsuario($user,$pass,$id_empleado);
        //$insert_empleado = mysqli_query($conectar," INSERT INTO empleado(nombre_empleado, apellido1_empleado , apellido2_empleado, sexo, edad,rfc_empleado, sueldo_base,puesto) VALUES('$nombre','$apellido1','$apellido2','$sexo','$edad','$rfc','$sueldo','$puesto')");
                    //$id_empleado = mysqli_insert_id($conectar);
                    //$insert_usuario = mysqli_query($conectar,"INSERT INTO usuario(usuario,contraseña,id_empleado) VALUES ('$user','$pas','$id_empleado')");


          if($error==""){
              
              $alert = ' <p class="msg_save"> Datos correctos </p> ';
              
           
          }

          
          else{
            
            $alert = '<p class"msg_error"> Error al crear el usuario </p>';
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

      <title>Agregar Usuario</title>
      
  </head>
<body style=" background:   #C5FEFE; ">
   <form  class="form-register" action="" method="post">
     <div class="tit" ><h1  class="text-center">USUARIO</h1></div>
  
    <h4>Agregar Usuario</h4>
      
      <input class="controls" type="text" name="nombre" id="nombres" placeholder="Ingrese El nombre*" pattern="([aA-zZ]{1,15})||[aA-zZ0-9]{1,8}[' '][aA-zZ0-9]{1,8}" Required 
       >
       <input class="controls" type="text" name="apellido1" id="apellido11" placeholder="Ingrese el primer apellido*" pattern="([aA-zZ]{1,15})" Required 
       >
       <input class="controls" type="text" name="apellido2" id="apellido22" placeholder="Ingrese el segundo apellido*" pattern="([aA-zZ]{1,15}" Required 
       >
       <select name="sexo" class="form-control"> 
          <option value="H">Hombre</option>
          <option value="M">Mujer</option> 

     </select><br>
     <input class="controls" type="number" name="edad"  min="18" max="100" placeholder="Ingrese la edad*" pattern="([0-9]{1,3}" required />
     <input class="controls" type="text" name="rfc" pattern="[A-Z]{3}[0-9]{6}[A-Z]{4}" placeholder="Ingrese el RFC del Empleado*"  required="" />
     <input class="controls" type="number" name="sueldo"  min="0" max="10000" pattern="([0-9]{1,3}" placeholder="Ingrese el sueldo base del empleado*" required />
     <select name="puesto" class="form-control" id="rol">
        
      <option value="Administrador">Administrador </option>
      <option value="Almacenista">Almacenista </option>
      <option value="Cajero">Cajero </option>
      <option value="Generente">Generente </option>

                              
      </select><br> 
      <input class="controls" type="text" name="user"  placeholder="Ingrese el usuario*" pattern="[A-Za-z0-9]{5,20}" minlength="5" maxlength="20" required="obligatorio" >
      <input class="controls" type="password" name="pass"  placeholder="Ingrese la contraseña*" pattern="[A-Za-z0-9@#$%]{8,20}" minlength="8" maxlength="20" required="obligatorio" >
      <br>
      <div ><?php echo isset($alert) ? $alert : ''; ?></div>
      <input class="btn  btn-primary" type="submit" value="Agregar"> |
      <a href="Usuario-administrador.php" class="btn  btn-primary" type="submit">    Cerrar    </a>

  
 </form>
</body>
</html>