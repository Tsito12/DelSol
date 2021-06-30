<?php
//include "conexion.php";
                                              
                                     
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Listado Cliente</title>
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
                    <div class="sesion col-12 col-sm-2 "><a href="salir.php"> 
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/caja.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>CLIENTES</p>
                    </div>

                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-6"><br>
                        <form action="buscarcli.php" method="get" class="form-control">
                            <div class="responsive input-group">
                                <input type="text" name="busqueda" class="form-control" placeholder="Buscar">
                                <input type="submit"  class="input-group-addon btn btn-outline-primary " value="Buscar">

                                <a href="" type="button" class=" btn btn-outline-primary " data-toggle="modal" data-target="#exampleModalCenterC" > <i class="fa fa-plus" aria-hidden="true"></i> Agregar </a>
                                
                                
                            </div>
                             
                        </form>
                             <?php include "modalAgregarC.php"; ?>
                    </div>
                    <div class="col-12 col-md-3"></div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                              <thead class="thead-dark">


                                <tr>
                                   <th># CLIETE</th> 
                                  <!--<th scope="col">NIT</th>-->
                                  <th scope="col">NOMBRE</th>
                                  <th scope="col">DIRECCION</th>
                                  <th scope="col">TELEFONO</th>
                                  <th scope="col">CORREO</th>
                                  <th colspan="2">ACCION</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                                <?php
                                    require_once "../modelo/Data.php";
                                    $d = new Data();
                                    $clientes = $d->getClientes();
                                    foreach($clientes as $c){
                                        echo "<tr>";
                                        echo "<td class=\"idc\">".$c->getIdCliente()."</td>";
                                        echo "<td class=\"nombre\">".$c->getNombreCliente()."</td>";
                                        echo "<td class=\"direccion\">".$c->getDireccionCliente()."</td>";
                                        echo "<td class=\"telefono\">".$c->getTelefonoCliente()."</td>";
                                        echo "<td class=\"correo\">".$c->getCorreoCliente()."</td>";
                                        echo "<td><button class=\"btn btn-warning\"onclick=\"editar(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminarProv(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                                        echo "</tr>";
                                    }
                                    /*
                                    $query =mysqli_query($conectar,"SELECT id_cliente,Nit,nombre_cliente,direccion_cliente,telefono_cliente,correo_cliente FROM cliente WHERE EstatusC = 1 order by id_cliente" );

                                    $result = mysqli_num_rows($query);
                                    
                                      while ($data = mysqli_fetch_array($query) ) {

                                        
                                    ?>
                                <tr>
                                  <th scope="row">
                                    C<?php echo $data['id_cliente'];?>
                                  </th>
                                  <td><?php echo $data['Nit'];?></td> 
                                  <td><?php echo $data['nombre_cliente'];?></td>    
                                  <td><?php echo $data['direccion_cliente'];?></td>
                                  <td><?php echo $data['telefono_cliente'];?></td>
                                  <td><?php echo $data['correo_cliente'];?></td>
                                  <td>
                                        
                                        <a href="EditarCliente.php?id=<?php echo $data['id_cliente']; ?>" type="button" class="btn btn-warning "><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a> 
                                      
                                       
                                    </td>
                                  
                                  <?php
                                      if(!empty($_GET['idu']))
                                       {
                                          $iduser = $_GET['idu'];

                                          $query_delete = mysqli_query($conectar, "UPDATE cliente SET EstatusC = 0 WHERE id_cliente = $iduser");

                                       }




                                        ?>
                                    <td>
                                    <a href="listadocliente.php?idu=<?php echo $data['id_cliente']; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</a></td>
                                    
                                 </tr>
                                
                                 <?php
                                 
                                
                                }

                                */
                              ?>
                               
                              </tbody>

                            </table>

                                <form action="editarCliente.php" method="post" id="frm">
                                    <input id="idc" name ="idc" class="d-none"/>
                                </form>
                    </div>
                    <div class="col-12"><br></div>
                     <div class="col-12" style="text-align: center;" >
                               <a href="Apartado.php" type="button" class=" btn btn-primary "  > <i class="fa fa-undo" aria-hidden="true"></i> Apartado </a>
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
    <script src="../controlador/Cliente.js"></script>
 

</body>
</html>