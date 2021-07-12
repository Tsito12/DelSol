<?php
require_once "../modelo/Data.php";
$d = new Data();

if(!empty($_POST['id'])){
  $id = $_POST['id'];

  $error = $d->deleteUsuario($id);
  $d->deleteEmpleado($id);
}


                                             
                                     
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Usuarios</title>

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
                
               <div class="container p-5" id="cont">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> <a href="../controlador/salir.php">
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/usuario.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>USUARIOS</p>
                    </div>

                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-6"><br>
                        <!--<form action="buscarU.php" method="get" class="form-control">-->
                            <div class="responsive input-group">
                                <input type="text" name="busqueda" class="form-control" id="buscar" onkeyup="buscarTabla()" placeholder="Buscar">
                                <!--<input type="submit"  class="input-group-addon btn btn-outline-primary " value="Buscar"> -->


                                <a href="AgregarForU.php" type="button" class=" btn btn-outline-primary "  > <i class="fa fa-plus" aria-hidden="true"></i> Agregar </a>
                            </div>
                          <!--</form>-->
                             
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
                                  <th scope="col">Id de Empleado</th>
                                  <th scope="col">Nombre Completo</th>
                                  <th scope="col">Sexo</th>
                                  <th scope="col">Edad</th>
                                  <th scope="col">RFC del Empleado</th>
                                  <th scope="col">Sueldo Base</th>
                                  <th scope="col">Puesto</th>
                                  <th scope="col">Usuario</th>
                                  <th scope="col">Contraseña</th> 
                                  <th scope="col">Opciones</th>
                                  <th scope="col">        </th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo" id="tabla">
                                
                                  <?php
                                  //require_once "../modelo/Data.php";
                                  
                                  $d = new Data();
                                  $empleados = $d->getEmpleados();
                                  foreach($empleados as $e){
                                    echo "<tr>";
                                    echo "<td class=\"ide\">".$e->getIdEmpleado()."</td>";
                                    echo "<td class=\"nombre\">".$e->getNombreEmpleado()." ".$e->getApellido1Empleado()." ".$e->getApellido2Empleado()."</td>";
                                    //echo "<td class=\"apellido1\">".$e->getApellido1Empleado()."</td>";
                                    //echo "<td class=\"apellido2\">".$e->getApellido2Empleado()."</td>";
                                    echo "<td class=\"sexo\">".$e->getSexo()."</td>";
                                    echo "<td class=\"edad\">".$e->getEdad()."</td>";
                                    echo "<td class=\"rfc\">".$e->getRfcEmpleado()."</td>";
                                    echo "<td class=\"sueldo\">".$e->getSueldoBase()."</td>";
                                    echo "<td class=\"puesto\">".$e->getPuesto()."</td>";
                                    echo "<td class=\"usuario\">".$e->getUsuario()."</td>";
                                    echo "<td class=\"passw\">".($e->getContrasenia())."</td>";
                                    echo "<td><button class=\"btn btn-warning\" onclick=\"editar(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminar(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Borrar</button></td>";
                                    echo "</tr>";
                                  }
                                  /*
                                    $query =mysqli_query($conectar,"SELECT e.id_empleado, e.nombre_empleado, e.apellido1_empleado,e.apellido2_empleado,e.sexo,e.edad,e.rfc_empleado, e.sueldo_base,e.puesto, u.usuario,u.contraseña FROM empleado e INNER JOIN usuario u on e.id_empleado = u.id_empleado WHERE e.Estatus=1 order by id_empleado" );
                                    $result = mysqli_num_rows($query);
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                  
                                  $d = new Data();
                                  $empleados = $d->getEmpleados();

                                  ?>
                                  <tr> 
                                      
                                      <td>E0000000<?php echo $data['id_empleado']; ?></th>
                                      <td ><?php echo $data['nombre_empleado'];?> <?php echo $data['apellido1_empleado'];?> <?php echo $data['apellido2_empleado'];?></td>
                                      <td><?php echo $data['sexo'];?></td>
                                      <td><?php echo $data['edad'];?></td>
                                      <td><?php echo $data['rfc_empleado'];?></td>
                                      <td><?php echo $data['sueldo_base'];?></td>
                                      <td><?php echo $data['puesto'];?></td>
                                      <td><?php echo $data['usuario'];?></td>
                                      <td><?php echo $data['contraseña'];?></td>
                                      
                                      <td>
                                        
                                        <a href="EditarU.php?id=<?php echo $data['id_empleado']; ?>" type="button" class="btn btn-warning "><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a> 
                                       
                                      </td>
                                      <td>
                                        <?php 
                                      

                                       if(!empty($_GET['idu']))
                                       {
                                          $iduser = $_GET['idu'];

                                          $query_delete = mysqli_query($conectar, "UPDATE empleado SET Estatus = 0 WHERE id_empleado = $iduser");

                                       }




                                        ?>
                                        <?php if ($data['puesto'] != 'Administrador') { ?>
                                          
                                        
                                       
                                        <a href="Usuario-administrador.php?idu=<?php echo $data['id_empleado']; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>Borrar</a>

                                      <?php  } ?>
                                      </td>
                                       
                                </tr>
                                <?php
                                 }
                                
                                }
                                */

                              ?>
                                
                              </tbody>
                            </table>

    
                    </div>

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
    <script src="../controlador/usuarios.js"></script>
 

</body>
</html>