<div  class="modal fade" id="exampleModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #E4FAF0;">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Clientes</h1>
        
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                        <table class="table table-hover">
                              <thead class="thead-dark">


                                <tr>
                                   <th># CLIENTE</th> 
                                  <!--<th scope="col">NIT</th>-->
                                  <th scope="col">NOMBRE</th>
                                  <th scope="col">DIRECCION</th>
                                  <th scope="col">TELEFONO</th>
                                  <th scope="col">CORREO</th>
                                  <!--<th colspan="2">ACCION</th>-->
                                  
                                  
                                </tr>
                              </thead>
                              <tbody class="tcuerpo">
                                <?php
                                    //require_once "../modelo/Data.php";
                                    $d = new Data();
                                    $clientes = $d->getClientes();
                                    foreach($clientes as $c){
                                        echo "<tr>";
                                        echo "<td class=\"idc\">".$c->getIdCliente()."</td>";
                                        echo "<td class=\"nombre\">".$c->getNombreCliente()."</td>";
                                        echo "<td class=\"direccion\">".$c->getDireccionCliente()."</td>";
                                        echo "<td class=\"telefono\">".$c->getTelefonoCliente()."</td>";
                                        echo "<td class=\"correo\">".$c->getCorreoCliente()."</td>";
                                        //echo "<td><button class=\"btn btn-warning\"onclick=\"editar(this)\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>Editar</button><button class=\"btn btn-danger\" onclick=\"eliminar(this)\" form=\"formulario\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>Eliminar</button></td>";
                                        echo "</tr>";
                                    }
                                    /*
                                    $query =mysqli_query($conectar,"SELECT id_cliente,Nit,nombre_cliente,direccion_cliente,telefono_cliente,correo_cliente FROM cliente WHERE EstatusC = 1 order by id_cliente" );

                                    $result = mysqli_num_rows($query);
                                    
                                      while ($data = mysqli_fetch_array($query) ) {

                                       */ 
                                    ?>
                                    <!-- 
                                <tr>
                                  <th scope="row">
                                    C<?php// echo $data['id_cliente'];?>
                                  </th>
                                  <td><?php //echo $data['Nit'];?></td> 
                                  <td><?php //echo $data['nombre_cliente'];?></td>    
                                  <td><?php //echo $data['direccion_cliente'];?></td>
                                  <td><?php //echo $data['telefono_cliente'];?></td>
                                  <td><?php //echo $data['correo_cliente'];?></td>
                                  <td>
                                        
                                        <a href="EditarCliente.php?id=<?php //echo $data['id_cliente']; ?>" type="button" class="btn btn-warning "><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a> 
                                      
                                       
                                    </td>  -->
                                  
                                  
                                    <td>
                                    <!--<a href="listadocliente.php?idu=<?php //echo $data['id_cliente']; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</a></td>-->
                                    
                                 </tr>
                                
                                 <?php
                                 
                                
                                //}

                                
                              ?>
                               
                              </tbody>

                            </table>
                    </div>
            </div>
            <div class="modal-footer">
                
                
            </div>
        </div>
    </div>
</div>
