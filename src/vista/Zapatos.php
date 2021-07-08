<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">

    <title>Inventario zapatos</title>

    <!-- Librerias CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../Style/Ausuario.css">

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    




</head>
<body onload="limpiar()"> <!-- Limpia los formularios al cargar la página -->
    <div class="wrapper">

     <?php include "menulateral.php"; ?>
     <div class="main_content container-responsive">
            <div class="cuerpo" style="">
                
               <div class="container pt-2">
              

                <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> <a href="../controlador/salir.php">
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/sapato.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>Zapatos</p>
                    </div>

                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-6"><br>
                    <!-- Formulario, aqui se especifica el archivo PHP que manejará la información-->
                        <form enctype="multipart/form-data" action="../controlador/guardarSapato.php" method="post" id="formulario">
                            <div class="responsive input-group">
                                <!-- Area para buscar un zapato por descripción -->
                                <input type="text" id="buscar" name="buscar" class="form-control" placeholder="Ingrese el nombre del modelo de zapato" onkeyup="buscarTabla()"><!--<span class="input-group-addon btn btn-outline-primary "> buscar</span>-->

                                <span  type="button" class="input-group-addon btn btn-outline-primary "  data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar </span>
                            </div>
                            <!-- Panel emergente donde se llenan los datos del modelo de zapato -->
                             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header ">
                                        <h5 class="modal-title " id="exampleModalLongTitle"> Agregar zapato</h5>
                                      </div>
                                      <div class="modal-body" id="editar_form">
                                        <form>
                                        <input class="d-none" id="editar" name="editar" value="0"></input>
                                        <input class="d-none" id="codigo" name="codigo"></input>
                                          <div class="form-group row">
                                                <label for="descripcion" class="col-sm-4 col-form-label">Descripcion*</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripcion del zapato" required onfocusout="vacio(this)" onKeyDown="letrasNumerosRaro()">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="modelo" class="col-sm-4 col-form-label">Modelo*</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el modelo" required onfocusout="vacio(this)" onKeyDown="letrasNumeros()">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="color" class="col-sm-4 col-form-label">Color*</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" name="color" id="color" placeholder="Ingrese el color" required onfocusout="vacio(this)" onKeyDown="soloLetras()">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="talla" class="col-sm-4 col-form-label">Talla*</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="talla" name="tallasZapato[]" multiple required onfocusout="vacio(this)">
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                        </select>
                                                        <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="precioc" class="col-sm-4 col-form-label">Precio de compra*</label>
                                                    <div class="col-sm-8">
                                                      <input type="numeric" class="form-control" id="precioc" name="precio_compra" placeholder="Ingrese el precio de compra" required onfocusout="comprobarPrecios(this)" onKeyDown="numerosPunto()">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="preciov" class="col-sm-4 col-form-label">Precio de venta*</label>
                                                    <div class="col-sm-8">
                                                      <input type="text" class="form-control" id="preciov" name="precio_venta" placeholder="Ingrese el precio de venta" required onfocusout="comprobarPreciosV(this)" onKeyDown="numerosPunto()">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="existencia" class="col-sm-4 col-form-label">Existencia*</label>
                                                    <div class="col-sm-8">
                                                      <input type="number" class="form-control" id="existencia" name="existencia" required onfocusout="vacio(this)" onKeyDown="soloNumeros()">
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="imagen" class="col-sm-4 col-form-label">Imagen</label>
                                                    <div class="col-sm-8">
                                                      <input type="file" class="form-control" id="imagen" name="imagenZapato">
                                                    </div>
                                          </div>
                                          <div class="form-group row">
                                                <label for="proveedor" class="col-sm-4 col-form-label">Proveedor*</label>
                                                    <div class="col-sm-8">
                                                      <select class="form-control" id="proveedor" name="proveedor" required onfocusout="vacio(this)">
                                                        <!--  Listado de todos los proveedores en la lista desplegable -->
                                                        <?php
                                                        require_once "../modelo/Data.php";
                                                        $d = new Data();
                                                        $proveedores = $d->getProveedores();
                                                        foreach($proveedores as $p){
                                                          echo "<option value=\"".$p->getIdProveedor()."\">".$p->getRazonSocial()."</option>";
                                                        }
                                                        ?>
                                                      </select>
                                                      <p class="vacio" style="font-size: 1rem; color: red; font-size: 0.75rem;"></p>
                                                    </div>
                                          </div>
                                          <p style="font-size: 1rem; font-size: 0.75rem;">*Campos requeridos</p>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiar()">Cerrar</button>
                                        <button type="submit" id="btnguardar" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <br>
                        </form>
                    </div>
                    <!-- Tabla que muestra todos los zapatos disponibles-->
                    <div class="table-responsive" id="abr">
                        <table class="table table-hover" id="tabla">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Modelo</th>
                                  <th scope="col">Color</th>
                                  <th scope="col">Tallas</th>
                                  <th scope="col">Precio compra</th>
                                  <th scope="col">Precio venta</th>
                                  <th scope="col">Existencia</th>
                                  <th scope="col">Imagen</th>
                                  <th scope="col">Proveedor</th>
                                  <th scope="col">Opciones</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                              <!-- Llenado de la tabla mediante la BD-->
                                <?php
                                require_once "../modelo/Data.php";
                                $d = new Data();
                                $sapatos = $d->getSapatos();
                                
                                foreach($sapatos as $s){
                                  echo "<tr>";
                                  echo "<td class=\"codigo d-none\">".$s->getCodigo()."</td>";
                                  echo "<td class=\"descripcion\">".$s->getDescripcion()."</td>";
                                  echo "<td class=\"modelo\">".$s->getModelo()."</td>";
                                  echo "<td class=\"color\">".$s->getColor()."</td>";
                                  $tallas = $d->getTallas($s->getCodigo());
                                  echo "<td class=\"tallas\">";
                                  for($i=0;$i<count($tallas);$i++){
                                    if($i===count($tallas)-1){
                                      echo $tallas[$i];
                                    }
                                    else{
                                      echo $tallas[$i].", ";
                                    }
                                    
                                  }
                                  echo "</td>";
                                  echo "<td class=\"precio_c\">".$s->getPrecioCompra()."</td>";
                                  echo "<td class=\"precio_v\">".$s->getPrecioVenta()."</td>";
                                  echo "<td class=\"existencia\">".$s->getExistencia()."</td>";
                                  echo "<td class=\"imagen\"> <img src=../controlador/mostrarImagen.php?codigo=".$s->getCodigo()." width=\"50\" height=\"50\" >";
                                  $prov = $d->getProveedor($s->getIdProveedor());
                                  echo "<td>".$prov->getRazonSocial()."</td>";
                                  echo "<td class=\"proveedor d-none\">".$s->getIdProveedor()."</td>";
                                  if($_SESSION['puesto']!="Cajero"){
                                    echo "<td><button class=\"btn btn-warning\"data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onclick=\"editar(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminar(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                                  }
                                  
                                  
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

 <!-- Librerías de Javascript-->
 
 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
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