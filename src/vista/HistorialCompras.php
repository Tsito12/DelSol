<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>HIstorial de compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../Style/Ausuario.css">

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    




</head>
<body onload="limpiar()">
    <div class="wrapper">
     <div class="navigation">
        

       
       

         <ul>
                <br>
             <div class="zapatos" >
                <h2>
                        <i class="fa fa-sun-o" aria-hidden="true"></i>
                                "DEL SOL"
                 </h2>
            </div>

            
            <div class="imgn"><br>
                 <img class="img" src="../imgZ/perfil.svg">
            </div>
            <div class="user-info"><br>
                                <span class="user-name"><strong>Daniel
                                        Perez</strong>
                                </span>
                                <span class="user-role">Administrador</span>
                                
            </div>
            

             <div class="texto1">
                <h2>Generales</h2>
             </div>


             <li>
                 <a href="menu.html">
                    <span class="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                    <span class="title">Dashboard</span>
                 </a>


             </li>
             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <span class="title">Punto de venta</span>
                 </a>


             </li>
             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-university" aria-hidden="true"></i></span>
                    <span class="title">Inventario</span>
                 </a>


             </li>
             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>
                    <span class="title">Reportes</span>
                 </a>


             </li>

             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                    <span class="title">Caja</span>
                 </a>


             </li>
             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-retweet" aria-hidden="true"></i></span>
                    <span class="title">Devoluciones</span>
                 </a>


             </li>
              <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <span class="title">Usuarios</span>
                 </a>


             </li>
              <li>
                 <a href="Proveedores.php">
                    <span class="icon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                    <span class="title">Provedores</span>
                 </a>


             </li>
             <div class="texto1">
                 <h2>Extra</h2>
             </div>
             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                    <span class="title">Ayuda<span class="badge badge-pill badge-primary"> Prox </span></span>
                 </a>


             </li>
             <li>
                 <a href="">
                    <span class="icon"><i class="fa fa-power-off" aria-hidden="true"></i></span>
                    <span class="title">Cerrar sesion</span>
                 </a>


             </li>

         </ul>
        
        

     </div>
     <div class="main_content container-responsive">
            <div class="cuerpo" style="">
                
               <div class="container pt-2">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> 
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/sapato.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>Historial de compras</p>
                    </div>

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header ">
                                        <h5 class="modal-title " id="exampleModalLongTitle"> Agregar zapato</h5>
                                      </div>
                                      <div class="modal-body" id="editar_form">
                                      <div class="table-responsive" id="nose">
                        <table class="table table-hover" id="tabla">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Folio de compra</th>
                                  <th scope="col">Empleado responsable</th>
                                  <th scope="col">Proveedor</th>
                                  <th scope="col">Total $</th>
                                  <th scope="col">Fecha</th>
                                  <th scope="col">Opciones</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                                <?php
                                require_once "../modelo/Data.php";
                                $d = new Data();
                                $compras = $d->getCompras();
                                
                                foreach($compras as $c){
                                  echo "<tr>";
                                  echo "<td class=\"codigo \">".$c->getIdCompra()."</td>";
                                  $empleado = $d->getEmpleado($c->getIdEmpleado());
                                  $prov = $d->getProveedor($c->getIdProveedor());
                                  echo "<td class=\"descripcion\">".$empleado."</td>";
                                  echo "<td class=\"modelo\">".$prov->getRazonSocial()."</td>";
                                  echo "<td class=\"color\">".$c->getTotalV()."</td>";
                                  
                                  echo "<td class=\"precio_c\">".$c->getFechaCompra()."</td>";
                                  echo "<td><button class=\"btn btn-warning detalle\"data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onclick=\"editar(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminar(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                                  
                                  echo "</tr>";
                                }
                                ?>
                              </tbody>
                            </table>

    
                    </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiar()">Cerrar</button>
                                        <button type="submit" id="btnguardar" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <br>

                    <div class="table-responsive" id="abr">
                        <table class="table table-hover" id="tabla">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Folio de compra</th>
                                  <th scope="col">Empleado responsable</th>
                                  <th scope="col">Proveedor</th>
                                  <th scope="col">Total $</th>
                                  <th scope="col">Fecha</th>
                                  <th scope="col">Opciones</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                                <?php
                                require_once "../modelo/Data.php";
                                $d = new Data();
                                $compras = $d->getCompras();
                                
                                foreach($compras as $c){
                                  echo "<tr>";
                                  echo "<td class=\"codigo \">".$c->getIdCompra()."</td>";
                                  $empleado = $d->getEmpleado($c->getIdEmpleado());
                                  $prov = $d->getProveedor($c->getIdProveedor());
                                  echo "<td class=\"descripcion\">".$empleado."</td>";
                                  echo "<td class=\"modelo\">".$prov->getRazonSocial()."</td>";
                                  echo "<td class=\"color\">".$c->getTotalV()."</td>";
                                  
                                  echo "<td class=\"precio_c\">".$c->getFechaCompra()."</td>";
                                  echo "<td><button class=\"btn btn-warning\"data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onclick=\"editar(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminar(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                                  
                                  echo "</tr>";
                                }
                                ?>
                              </tbody>
                            </table>

    
                    </div>
                    <nav>
                    <div id="barra" class="box"></div>
                    </nav>
                </div>
            </div>
            
            </div>
         
        </div>
 </div>
 
 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script src="../controlador/paginator.js"></script>
    <script src="../controlador/HistorialPedidos.js"></script>
 

</body>
</html>