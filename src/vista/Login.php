<!-- creacion del codigo php -->
<?php
//inicializar una sesion
session_start();
  $alert = '';
//se crea una condicion en donde se verifica que si hay una sesion activa no se podra ir a login permanece en la pagina principal 
if (!empty($_SESSION['active'])) {
  header('location: Principal-admin.php');

}else{
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
       $alert = 'Ingrese su usuario y contraseña';
    }

// creacion de conexion y sentencias para el usuario y password mediante la sentencia sql
    else{
      require_once "../modelo/Data.php";
      $abr = new Data();
      $conectar=$abr->getConexion()->getCon();
      $user = mysqli_real_escape_string($conectar,$_POST['usuario']);
      $pass = md5(mysqli_real_escape_string($conectar,$_POST['clave']));
      $cont = $_POST['clave'];
      $query = mysqli_query($conectar,"SELECT e.id_empleado, e.nombre_empleado, e.apellido1_empleado , e.apellido2_empleado, e.sexo, e.edad,e.rfc_empleado, e.sueldo_base,e.puesto,u.usuario, u.contraseña FROM empleado e INNER JOIN usuario u on e.id_empleado = u.id_empleado WHERE u.usuario = '$user' AND u.contraseña = '$cont'");
      $result = mysqli_num_rows($query);

    


//se obtienen los valores del query
      if ($result > 0) {
         $data = mysqli_fetch_array($query);
         
         $_SESSION['active'] = true;
         $_SESSION['idEmp'] = $data['id_empleado'];
         $_SESSION['Nombre'] = $data['nombre_empleado'];
         $_SESSION['Ape1'] = $data['apellido1_empleado'];
         $_SESSION['Ape2'] = $data['apellido2_empleado'];
         $_SESSION['sexo'] = $data['sexo'];
         $_SESSION['edad'] = $data['edad'];
         $_SESSION['rfc'] = $data['rfc_empleado'];
         $_SESSION['sueldo'] = $data['sueldo_base'];
         $_SESSION['puesto'] = $data['puesto'];
         $_SESSION['user'] = $data['usuario'];
         $_SESSION['pass'] = $data['contraseña'];
         


         
         

           header('location: Principal-admin.php');

      }else{
        $alert = 'El usuario o la contraseña son incorectos ';

      }
      
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login-Zapateria</title>
    <link rel="stylesheet" href="../Style/Style.css">

<style type="text/css">
  .login-box {
  opacity: .9;
  width: 340px;
  height: 460px;
  background: #0F24F9;
  color: #fff;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 70px 30px;
}
</style>

  </head>
<body background="../imgZ/FonLog.jpg">
	<div class="login-box">
      <img src="../imgZ/sol.svg" class="avatar" alt="Avatar Image">
      <h1>Bienvenido al sistema web</h1>
      <h1>"ZAPATERIA DEL SOL"</h1>
      <h3>Inicio de sesion</h3>
      <form action=" " method="post" >
        <!-- usuario -->
        <label for="Usuario" class="colocar_usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required="obligatorio" placeholder="Ingrese su usuario*">
        <!-- contraseña -->
        <label for="pass" class="colocar_pass">Contraseña</label>
        <input type="password" pattern="[A-Za-Z0-9@#$%]{5,20}" minlength="5" maxlength="20" name="clave" id=" pass" required="obligatorio" placeholder="Ingrese su contraseña*">
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
        <!--Boton de entrada-->
        <input type="submit" value="Entrar">
        
      </form>
    </div>
	
</body>
</html>