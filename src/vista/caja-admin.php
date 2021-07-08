<?php
//include "conexion.php";
//require_once "/var/www/html/DelSol/src/modelo/Data.php";                                        
    //$d = new Data();      
    //session_start();
    //$_SESSION['db'] = $d;        
    include "../modelo/Data.php";  
    $d=new Data();
    //var_dump($d);                
?>

<?php
    if(!empty($_POST['idu']))
    {   
        //$d = $_SESSION['db'];
        //require_once "../modelo/Data.php";
        $iduser = $_POST['idu'];
        $ide = $_POST['ide'];
        //$d = new Data();
        $error = $d->eliminarCajero($iduser,$ide);
        echo($error);
        //$query_delete = mysqli_query($conectar, "UPDATE cajero SET EstatusC = 0 WHERE id_cajero = $iduser");

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Caja Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../Style/Acaja.css">

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

</head>
<body >
    <div class="wrapper">
     <?php include "menulateral.php"; ?>
     <div class="main_content container-responsive">
            
            <div class="cuerpo" style="">
                
               <div class="container p-5">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "><a href="../controlador/salir.php"> 
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/caja.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>CAJERO</p>
                    </div>

                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-6"><br>
                        <!--<form action="buscarC.php" method="get" class="form-control">-->
                            <div class="responsive input-group">
                                <input type="text" id="buscar" onkeyup="buscarTabla()" name="busqueda" class="form-control" placeholder="Buscar">
                                <!--<input type="submit"  class="input-group-addon btn btn-outline-primary " value="Buscar">-->

                                <a href="AgregarC.php" type="button" class=" btn btn-outline-primary " > <i class="fa fa-plus" aria-hidden="true"></i> Agregar </a>
                            </div>
                             
                       <!-- </form> -->
                    </div>
                    <div class="col-12 col-md-3"></div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                              <thead class="thead-dark">


                                <tr>
                                  <th scope="col">ID Empleado</th>
                                  <th scope="col">ID Cajero</th>
                                  <th scope="col">Numero de caja</th>
                                  <th scope="col">Opcion</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody class="tcuerpo" id="tabla">
                              
                                <?php
                                    //$d = new Data();
                                    $cajeros = $d->getCajeros();
                                    foreach($cajeros as $c){
                                    echo "<tr>";
                                    echo "<td class=\"ide\">".$c->getIdEmpleado()."</td>";
                                    echo "<td class=\"idc\">".$c->getIdCajero()."</td>";
                                    echo "<td class=\"numcaja\">".$c->getNumCaja()."</td>";
                                    echo "<td><button class=\"btn btn-danger\" onclick=\"eliminar(this)\" ><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                                    echo "</tr>";
                                    }
                                    //$query =mysqli_query($conectar,"SELECT id_empleado, id_cajero, num_caja FROM cajero WHERE EstatusC = 1 order by id_cajero" );

                                    //$result = mysqli_num_rows($query);
                                    /*
                                    if($result>0){
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                <tr>
                                  <th scope="row">
                                    E000000<?php echo $data['id_empleado'];?>
                                  </th>
                                  <td>C000000<?php echo $data['id_cajero'];?></td> 
                                  <td><?php echo $data['num_caja'];?></td>    
                                  
                                  <?php
                                      if(!empty($_GET['idu']))
                                       {
                                          $iduser = $_GET['idu'];

                                          $query_delete = mysqli_query($conectar, "UPDATE cajero SET EstatusC = 0 WHERE id_cajero = $iduser");

                                       }




                                        ?>
                                    <td>
                                    <a href="caja-admin.php?idu=<?php echo $data['id_cajero']; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>Borrar</a></td>
                                </tr>
                                 <?php
                                 }
                                
                                }
                                */

                              ?>
                               
                              </tbody>

                            </table>
                            <form action="" id="frm" method="POST">
                                <input id = "idc" name="idu" class="d-none"/>
                                <input id = "ide" name="ide" class="d-none"/>
                            </form>
                            <div ><?php echo isset($error) ? $error : ''; ?></div>
    
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
    <script src="../controlador/Cajero.js"></script>
 

</body>
</html>