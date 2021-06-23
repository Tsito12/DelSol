<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Registar pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../Style/Ausuario.css">

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../controlador/pedidos.js"></script>

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
                
               <div class="container p-5">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> 
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/Camion.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>Compras</p>
                    </div>

                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-6"><br>
                        
                    </div>
                    <div class="col-12">
            <!--<h2 class="align-self-center text-center">Compras</h2>-->
        </div>

        <div class="row">
        <div class="col-sm-12 ml-auto row">
                            <div class="col-5"></div>
                            <label class="col-4 ml-auto">No. Folio:</label>
                            <div class="col-12 d-flex">
                            <div class="col-5"></div>
                            <?php
                                require_once "../modelo/Data.php";
                                $d = new Data();
                                $idc = $d->getIdCompra();
                                $fr = substr($idc,1,9);
                                $fr = intval($fr)+1;
                                $folio="C";
                                for($i = 1; ($i<10-strlen($fr)); $i++){
                                    $folio.="0";
                                }
                                $folio.=$fr;
                                echo("<input type=\"text\" name=\"No. Serie\" value=\"".$folio."\" class=\"form-control \" disabled>");
                            ?>
                            </div>
                            
            </div>
            <div class="col-12 col-md-4 parteFormulario">
            
                <div class="card border border-info">
                    <form id="frm" action="../controlador/GuardarPedido.php" method="post">
                        <div class="card-body">
                            <!-- REFERENTE A LOS DATOS DEL EMPLEADO -->
                            <!--
                            <div class="form-group">
                                Datos del empleado
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 d-flex">
                                    <input type="text" name="codEmpleado" class="form-control" placeholder="Código">
                                    <input type="submit" name="accion" value="Buscar" class="btn btn-outline-info">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="nomEmpleado" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            -->

                            <!-- REFERENTE A LOS DATOS DEL PRODUCTO -->
                            
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="prov">Proveedor</label>
                                    <select id="prov" name="proveedor" onchange="desactivarP()">
                                    <option value="">Seleccione un proveedor</option>
                                    <?php
                                                        require_once "../modelo/Data.php";
                                                        $d = new Data();
                                                        $proveedores = $d->getProveedores();
                                                        foreach($proveedores as $p){
                                                          echo "<option value=\"".$p->getIdProveedor()."\">".$p->getRazonSocial()."</option>";
                                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Datos del producto
                                </div>
                                <div class="col-sm-12 d-flex">
                                    <input type="tel" id="inputModelo" name="modelo" value="" class="form-control" 
                                           placeholder="Código">
                                    <input type="button" id="btnbuscar" name="accion"  value="Buscar" class="btn btn-outline-info">
                                </div>

                                <div class="col-sm-12">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" id="descripcion" name="nomProducto" value="" class="form-control" 
                                           placeholder="Nombre" disabled>
                                </div>
                            </div>

                            <!-- REFERENTE A LOS DETALLES DEL PRODUCTO -->
                            <div class="form-group row">
                                <div class="col-sm-5 ">
                                    <label for="precioCompra">Precio c</label>
                                    <input type="text" id="precioCompra" name="precioCompra" value="" class="form-control" placeholder="0.00">
                                </div>

                                <div class="col-sm-4">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" id="cantidad" name="cantidadN" value="1" class="form-control">
                                </div>

                                <div class="col-sm-3">
                                    <label for="stock">Stock</label>
                                    <input type="text" id="stock" name="stock" value="" class="form-control" 
                                           placeholder="Stock" disabled="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="button" id="btnagregar" name="accion" value="Agregar" class="btn btn-outline-success">
                            </div>
                            <select class="d-none" id="codigos" name="codigos[]" multiple>

                            </select>
                            <select class="d-none" id="cantidades" name="cantidades[]" multiple>

                            </select>
                            <input  class="d-none" id="total" name="total">
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="col-12 col-md-8 parteTabla">
                <div class="card border border-info">
                    <div class="card-body">
                        

                        <br>
                      <div class="table-responsive">                                  
                        <table class="table table-hover table-bordered" id="tabla">
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Descripción</th>
                                    <th>Tallas</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal</th>
                                    <th class="opc">Opciones</th>
                                </tr>
                            </thead>

                            <tbody id=cuerpoTabla>
                                

                            </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="card-footer row">
                        <div class="col-sm-6">
                            <button class="btn btn-success" onclick="guardarCompra()"
                               >
                                <i class='bx bx-check-shield'> Guardar pedido</i>
                            </button>
                            <a type="submit" name="accion" onclick="cancelarPedido()" value="Cancelar" class="btn btn-danger">
                                <i class='bx bx-x-circle' > Cancelar</i>
                            </a>
                        </div>
                        
                        <div class="col-sm-3">
                            <label for="descuento">Descuento</label>
                            <input type="checkbox" id="descuento">
                        </div>

                        <div col-sm-3 ml-auto>
                            <input type="text" id="txtTotal" name="txtTotal" value="" class="form-control" disabled="">
                        </div>
                    </div>
                </div>


            </div>
        </div>

                </div>
            </div>
            
            </div>
         
        </div>
 </div>
     
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
        </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!--<script src="../controlador/herramientas.js"></script>-->
 

</body>
</html>