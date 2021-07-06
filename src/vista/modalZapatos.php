<div  class="modal fade" id="exampleModalZapato" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #E4FAF0;">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Zapatos</h1>
        
            </div>
            <div class="modal-body">
                <div class="table-responsive" id="abr">
                    <table class="table table-hover" id="tabla">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Color</th>
                            <th scope="col">Tallas</th>
                            <!--<th scope="col">Precio compra</th>-->
                            <th scope="col">Precio venta</th>
                            <th scope="col">Existencia</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Proveedor</th>
                            <!--<th scope="col">Opciones</th>-->
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
                            echo "<td class=\"codigo\">".$s->getCodigo()."</td>";
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
                            //echo "<td class=\"precio_c\">".$s->getPrecioCompra()."</td>";
                            echo "<td class=\"precio_v\">".$s->getPrecioVenta()."</td>";
                            echo "<td class=\"existencia\">".$s->getExistencia()."</td>";
                            echo "<td class=\"imagen\"> <img src=../controlador/mostrarImagen.php?codigo=".$s->getCodigo()." width=\"50\" height=\"50\" >";
                            $prov = $d->getProveedor($s->getIdProveedor());
                            echo "<td>".$prov->getRazonSocial()."</td>";
                            echo "<td class=\"proveedor d-none\">".$s->getIdProveedor()."</td>";
                            //echo "<td><button class=\"btn btn-warning\"data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onclick=\"editar(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminar(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                            
                            echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <nav>
                    <div id="barra" class="box"></div>
                    </nav>
                </div>
            </div>
            <div class="modal-footer">
                
                
            </div>
        </div>
    </div>
</div>
