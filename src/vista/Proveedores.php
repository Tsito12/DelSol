<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Provedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../Style/Ausuario.css">

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

</head>
<body onload="limpiarProv()">
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
                 <a href="Zapatos.php">
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
                 <a href="#">
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
                
               <div class="container p-5">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> 
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/diablito.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>Proveedores</p>
                    </div>

                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-6"><br>
                        <form id="formP" method="POST" action="../controlador/Proveedores.php">
                            <div class="responsive input-group">
                                <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese el nombre del proveedor" onkeyup="buscarTabla()"><span class="input-group-addon btn btn-outline-primary "> buscar</span>

                                <span  type="button" class="input-group-addon btn btn-outline-primary "  data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar </span>
                            </div>
                             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header ">
                                        <h5 class="modal-title " id="exampleModalLongTitle"> Agregar proveedor</h5>
                                      </div>
                                      <div class="modal-body">
                                        <form>
                                        <input class="d-none" id="accion" name="accion" value="0"></input>
                                        <input class="d-none" id="codigo" name="codigo"></input>
                                          <div class="form-group row">
                                                <label for="empresa" class="col-sm-4 col-form-label">Nombre de la empresa*</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="empresa" name="razonsocial" placeholder="Ingrese el nombre de la empresa" required onfocusout="vacio(this)">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          
                                          <div class="form-group row">
                                            <label for="direccion" class="col-sm-4 col-form-label">Dirección de la empresa*</label>
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección de de la empresa" required onfocusout="vacio(this)">
                                                  <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                </div>
                                         </div>
                                          <div class="form-group row">
                                                <label for="telefono" class="col-sm-4 col-form-label">Teléfono*</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono de la empresa" required onfocusout="comprobarNumTel(this)">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Correo electronico*</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese el correo electronico de la empresa" required onfocusout="vacio(this)">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="rfc" class="col-sm-4 col-form-label">RFC de la empresa*</label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control" id="rfc" name ="rfc" placeholder="Ingrese el RFC de la empresa" required onfocusout="vacio(this)">
                                              <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                            </div>
                                          </div>
                                          <p style="font-size: 1rem; font-size: 0.75rem;">*Campos requeridos</p>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarProv()">Cerrar</button>
                                        <button type="submit" id="btnguardar" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <br>
                        </form>
                    </div>

                    <div class="table-responsive" id="abr">
                        <table class="table table-hover" id="tabla">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Empresa</th>
                                  <th scope="col">Dirección</th>
                                  <th scope="col">Télefono</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">RFC</th>
                                  <th scope="col">Opciones</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                              <?php
                                require_once "../modelo/Data.php";
                                $d = new Data();
                                $proveedores = $d->getProveedores();

                                foreach($proveedores as $p){
                                    echo "<tr>";
                                    echo "<td class=\"id_prov d-none\">".$p->getIdProveedor()."</td>";
                                    echo "<td class=\"razonSocial\">".$p->getRazonSocial()."</td>";
                                    echo "<td class=\"direccion\">".$p->getDireccionProveedor()."</td>";
                                    echo "<td class=\"telefono\">".$p->getTelefonoProveedor()."</td>";
                                    echo "<td class=\"correo\">".$p->getCorreoProveedor()."</td>";
                                    echo "<td class=\"rfc\">".$p->getRfcProveedor()."</td>";
                                    echo "<td><button class=\"btn btn-warning\"data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onclick=\"editarProv(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminarProv(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                                    echo "</tr>";
                                }
                              ?>
                              </tbody>
                            </table>

    
                    </div>
                    <div id="barra" class="box"></div>
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
    <script src="../controlador/paginator.js"></script>
    <script src="../controlador/herramientas.js"></script>                            

</body>
</html>