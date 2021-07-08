<?php
require_once "Conexion.php";
require_once "zapato.php";
require_once "proveedor.php";
require_once "Compra.php";
require_once "DetalleCompra.php";
require_once "empleado.php";
require_once "Usuario.php";
require_once "Cajero.php";
require_once "Cliente.php";
require_once "apartado.php";
class Data{
    private $con;

    public function __construct(){
        $this->con = new Conexion("localhost","zapateriadelsol","pma","hola0123456");
    }

    public function getConexion(){
        return $this->con;
    }

    public function getSapatos(){
        $sapatos = array();

        $query = "select * from zapato";
        $res = $this->con->ejecutar($query);

        while($reg = mysqli_fetch_array($res)){
            $s = new Zapato($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8]);

            array_push($sapatos,$s);
        }
        return $sapatos;
    }

    public function getTallas($id){
        $tallas = array();
        $query = "select * from talla_zapato where codigo = $id";
        $res = $this->con->ejecutar($query);

        while($reg = mysqli_fetch_array($res)){
            $talla = $reg[1];
            array_push($tallas, $talla);
        }
        return $tallas;
    }

    public function getSapato($codigo){
        $sapato;
        $query = "select * from zapato where codigo = $codigo";
        $res = $this->con->ejecutar($query);

        while($reg = mysqli_fetch_array($res)){
            $sapato = new Zapato($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8]);
        }
        return $sapato;
    }

    public function guardarSapato($sapato){
        $descripcion=$sapato->getDescripcion();
        $modelo=$sapato->getModelo();
        $color=$sapato->getColor();
        $precio_compra=$sapato->getPrecioCompra();
        $precio_venta=$sapato->getPrecioVenta();
        $existencia=$sapato->getExistencia();
        $imagen=$sapato->getImagen();
        $id_proveedor=$sapato->getIdProveedor();

        /*
        $query = "insert into zapato (`descripcion`, `modelo`, `color`, `precio_compra`, `precio_venta`, `existencia`, `imagen`, `id_proveedor`) values ($descripcion,$modelo,$color,
                                             $precio_compra,$precio_venta,$existencia,'$imagen',$id_proveedor)";

                                             //echo "<br><br>Consulta<br><br>";
                                             //echo $query;
        //$res = $this->con->ejecutar($query);
        */
        /*$query = "call insert_sapato('$descripcion','$modelo','$color',
                                             $precio_compra,$precio_venta,$existencia,'$imagen',$id_proveedor);";*/

        $query = "call insert_sapato(?,?,?,?,?,?,?)";
        
        if ($stmt = mysqli_prepare($this->con->getCon(), $query)) {
            mysqli_stmt_bind_param($stmt, "sssddis", $descripcion,$modelo,$color,$precio_compra,$precio_venta,
                                   $existencia,$id_proveedor);
            //mysqli_stmt_send_long_data ($stmt , 6 , $imagen);
            mysqli_stmt_execute($stmt);
            $result = mysqli_store_result($this->con->getCon());
            mysqli_stmt_bind_result($stmt, $cod_sapato);
            mysqli_stmt_fetch($stmt);
            mysqli_free_result($result);
            mysqli_stmt_close($stmt);
            mysqli_next_result($this->con->getCon());
            
        }
        

        /*
        if (mysqli_multi_query($this->con->getCon(), $query)) {
            do {
                // almacenar primer juego de resultados 
                if ($result = mysqli_store_result($link)) {
                    while ($row = mysqli_fetch_row($result)) {
                        printf("%s\n", $row[0]);
                        $talla=$row[0];
                    }
                    mysqli_free_result($result);
                }
                // mostrar divisor 
                if (mysqli_more_results($link)) {
                    printf("-----------------\n");
                }
            } while (mysqli_next_result($link));
        }
        else{
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        */
        $consulta_imagen = "UPDATE `zapato` SET `imagen` ='$imagen' where codigo=$cod_sapato";
        $this->con->ejecutar($consulta_imagen);
        /*
        $res = $this->con->ejecutar($query);
        while($reg = mysqli_fetch_array($res)){
            $talla = $reg[0];
        }
        */
        
        /*
        if(! $res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        else{
            //header("Location: ../vista/feik.php");
            //alert("Zapato agregado correctamente");
        }*/
        return $cod_sapato;
    }

    public function getProveedores(){
        $proveedores = array();

        $query = "select * from proveedor;";
        $res = $this->con->ejecutar($query);

        while($reg = mysqli_fetch_array($res)){
            $p = new Proveedor($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5]);

            array_push($proveedores,$p);
        }
        return $proveedores;
    }

    public function guardarZapatoTalla($id_zapato, $talla){
        $query = "insert into talla_zapato values ($id_zapato, $talla,2);";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
    }

    public function getProveedor($id_prov){
        $query = "select * from proveedor where id_proveedor='$id_prov'";
        $res = $this->con->ejecutar($query);
        $reg = mysqli_fetch_array($res);
        $proveedor = new Proveedor($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5]);
        return $proveedor;
    }

    public function editarSapato($sapato){
        $codigo = $sapato->getCodigo();
        $descripcion=$sapato->getDescripcion();
        $modelo=$sapato->getModelo();
        $color=$sapato->getColor();
        $precio_compra=$sapato->getPrecioCompra();
        $precio_venta=$sapato->getPrecioVenta();
        $existencia=$sapato->getExistencia();
        $imagen=$sapato->getImagen();
        $id_proveedor=$sapato->getIdProveedor();

        $query = "UPDATE zapato set descripcion = '$descripcion', modelo = '$modelo', color = '$color', 
                  precio_compra = $precio_compra , precio_venta = $precio_venta, existencia = $existencia,
                  imagen = '$imagen', id_proveedor = '$id_proveedor' where codigo = $codigo";
        $res = $this->con->ejecutar($query);
        if(!$res){
            //printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
            printf($query);
        }

    }

    public function editarSapatoNoImg($sapato){
        $codigo = $sapato->getCodigo();
        $descripcion=$sapato->getDescripcion();
        $modelo=$sapato->getModelo();
        $color=$sapato->getColor();
        $precio_compra=$sapato->getPrecioCompra();
        $precio_venta=$sapato->getPrecioVenta();
        $existencia=$sapato->getExistencia();
        $imagen=$sapato->getImagen();
        $id_proveedor=$sapato->getIdProveedor();

        $query = "UPDATE zapato set descripcion = '$descripcion', modelo = '$modelo', color = '$color', 
                  precio_compra = $precio_compra , precio_venta = $precio_venta, existencia = $existencia,
                  id_proveedor = '$id_proveedor' where codigo = $codigo";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }

    }

    public function deleteTallas($codigo){
        $query = "DELETE from talla_zapato where codigo = $codigo";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
    }

    public function deleteSapato($codigo){
        $query = "DELETE from zapato where codigo = $codigo";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
    }

    public function guardarProveedor($proveedor){
        $razon_social = $proveedor->getRazonSocial();
        $direccion = $proveedor->getDireccionProveedor();
        $telefono = $proveedor->getTelefonoProveedor();
        $correo = $proveedor->getCorreoProveedor();
        $rfc = $proveedor->getRfcProveedor();
        $query="insert into proveedor values('0','$razon_social','$direccion','$telefono','$correo','$rfc')";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
    }

    public function editarProveedor($proveedor){
        $idp = $proveedor->getIdProveedor();
        $razon_social = $proveedor->getRazonSocial();
        $direccion = $proveedor->getDireccionProveedor();
        $telefono = $proveedor->getTelefonoProveedor();
        $correo = $proveedor->getCorreoProveedor();
        $rfc = $proveedor->getRfcProveedor();
        $query="UPDATE proveedor set razon_social = '$razon_social', direccion_proveedor ='$direccion',
                                     telefono_proveedor = '$telefono', correo_proveedor = '$correo',
                                     rfc_proveedor = '$rfc' WHERE id_proveedor = '$idp'";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
    }

    public function deleteProveedor($idp){
        $query = "DELETE from proveedor where id_proveedor = '$idp'";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
    }

    public function getSapatoMod($modelo){
        $sapato;
        $query = "select * from zapato where modelo = '$modelo'";
        $res = $this->con->ejecutar($query);

        while($reg = mysqli_fetch_array($res)){
            $sapato = new Zapato($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8]);
        }
        return $sapato;
    }

    public function guardarCompra($compra){
        $id_empleado = $compra->getIdEmpleado();
        $id_proveedor = $compra->getIdProveedor();
        $total_v = $compra->getTotalV();
        $fecha = $compra->getFechaCompra();
        $query="INSERT into compra values ('0','$id_empleado','$id_proveedor',$total_v,'$fecha')";

        $res = $this->con->ejecutar($query);
        echo($query."<br>");
        if(!$res){
            printf("Errormessage: %s\n Quey: %s\n", mysqli_error($this->con->getCon(), $query));
        }
        //printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
    }

    public function guardarDetalleCompra($detalleCompra){
        $id_compra = $detalleCompra->getIdCompra();
        $codigo = $detalleCompra->getCodigo();
        $cantidad = $detalleCompra->getCantidad();

        $query="INSERT into detalle_compra values ('$id_compra',$codigo,$cantidad)";
        echo("<br> Consulta detalle compra".$query."<br>");
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        //printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
    }

    public function getIdCompra(){
        $query="SELECT max(id_compra) from compra";
        $res = $this->con->ejecutar($query);
        $reg = mysqli_fetch_array($res);
        $id_compra = $reg[0];

        return $id_compra;
    }

    public function getCompras(){
        $compras = array();
        $query="SELECT * from compra";
        $res = $this->con->ejecutar($query);
        
        while($reg = mysqli_fetch_array($res)){
            $c = new Compra($reg[0],$reg[1],$reg[2],$reg[3],$reg[4]);
            array_push($compras,$c);
        }
        return $compras;
        
    }

    public function getEmpleado($ide){
        $query = "SELECT nombre_empleado, apellido1_empleado, apellido2_empleado from empleado where id_empleado = '$ide'";
        $res = $this->con->ejecutar($query);
        $reg = mysqli_fetch_array($res);
        $empleado = $reg[0]." ".$reg[1]." ".$reg[2];
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        return $empleado;
    }

    public function getEmpleados(){
        $empleados = array();
        $query ="SELECT e.id_empleado, e.nombre_empleado, e.apellido1_empleado,e.apellido2_empleado,e.sexo,
                e.edad,e.rfc_empleado, e.sueldo_base,e.puesto, u.usuario,u.contraseña FROM empleado e 
                INNER JOIN usuario u on e.id_empleado = u.id_empleado order by id_empleado";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $e = new Empleado($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],$reg[9],$reg[10]);
            array_push($empleados,$e);
        }
        return $empleados;
    }

    public function getEmpleadoU($ide){
        $query = "SELECT e.id_empleado,e.nombre_empleado,e.apellido1_empleado,e.apellido2_empleado,
                 e.sexo,e.edad,e.rfc_empleado,e.sueldo_base, e.puesto ,u.usuario, u.contraseña 
                 FROM empleado e INNER JOIN usuario u on e.id_empleado = u.id_empleado WHERE e.id_empleado = '$ide' ";
        $res= $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        $reg = mysqli_fetch_array($res);
        $empleado = new Empleado($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],$reg[9],$reg[10]);
        return $empleado;
    }

    public function selectUsuario($user, $ide){
        $query = "SELECT * FROM usuario 
                                WHERE   usuario = '$user' AND id_empleado != '$id'";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        $reg = mysqli_fetch_array($res);
        $usuario = new Usuario($reg[0],$reg[1],$reg[2]);
        return $usuario;
    }

    public function selectUsuarioN($user, $nombre){
        $empleado;
        $query = "SELECT u.id_empleado,e.nombre_empleado, e.apellido1_empleado,e.apellido2_empleado,e.sexo,e.edad,
                  e.rfc_empleado, e.sueldo_base,e.puesto, u.usuario, u.contraseña 
                  FROM empleado e INNER JOIN usuario u on e.id_empleado = u.id_empleado
                                WHERE e.nombre_empleado = '$nombre' OR u.usuario = '$user'";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        $reg = mysqli_fetch_array($res);
        $empleado = new Empleado($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5],$reg[6],$reg[7],$reg[8],$reg[9],$reg[10]);
        return $usuario;
    }

    public function updateUsuario($nom,$ape1,$ape2,$sexo,$edad,$rfc,$sueldo,$puesto,$user,$id){
        $error="";
        $query = "UPDATE empleado e INNER JOIN usuario u ON u.id_empleado = e.id_empleado  
                  SET e.nombre_empleado = '$nom', e.apellido1_empleado = '$ape1', e.apellido2_empleado= '$ape2', 
                  e.sexo = '$sexo', e.edad = $edad,e.rfc_empleado='$rfc',e.sueldo_base =$sueldo, 
                  e.puesto = '$puesto', u.usuario = '$user' WHERE e.id_empleado = '$id'";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function getIdEmpleado(){
        $query = "SELECT max(id_empleado) from empleado";
        $res = $this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n", $error);
        }
        $reg = mysqli_fetch_array($res);
        $ide = $reg[0];

        return $ide;
    }

    public function guardarUsuario($user,$pas,$id_empleado){
        $error="";
        $query="INSERT INTO usuario(usuario,contraseña,id_empleado) VALUES ('$user','$pas','$id_empleado')";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function guardarEmpleado($nombre,$apellido1,$apellido2,$sexo,$edad,$rfc,$sueldo,$puesto){
        $error="";
        $query = "INSERT INTO empleado(nombre_empleado, apellido1_empleado , apellido2_empleado, 
                  sexo, edad,rfc_empleado, sueldo_base,puesto) 
                  VALUES('$nombre','$apellido1','$apellido2','$sexo',$edad,'$rfc',$sueldo,'$puesto')";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function deleteUsuario($id){
        $query = "DELETE from usuario where id_empleado='$id'";
        $res = $this->con->ejecutar($query);
        $error="";
        if(!$res){
            $error = mysqli_error($this->con->getCon()).$query;
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        return $error;
    }

    public function deleteEmpleado($id){
        $query = "DELETE from empleado where id_empleado='$id'";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
    }

    public function getCajeros(){
        $cajeros = array();
        $query = "SELECT * FROM cajero";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $c = new Cajero($reg[0],$reg[1],$reg[2]);
            array_push($cajeros,$c);
        }
        return $cajeros;
    }

    public function eliminarCajero($idc,$ide){
        $error="";
        $query = "DELETE from cajero where id_cajero = '$idc' and id_empleado = '$ide'";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function getCajero($ide,$idcajero){
        $query = "SELECT * FROM cajero WHERE id_cajero = '$idcajero' or id_empleado = '$ide'";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n Query: %s", $error, $query);
            return $error;
        }
        $reg = mysqli_fetch_array($res);
        $cajero = new Cajero($reg[0],$reg[1],$reg[2]);

        return $cajero;
    }

    public function agregarCajero($idempleado,$idcajero,$numcajero){
        $query = "INSERT INTO cajero(id_empleado, id_cajero, num_caja) VALUES('$idempleado','$idcajero',$numcajero)";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            //printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function getClientes(){
        $clientes = array();
        $query="SELECT * from cliente";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $c = new Cliente($reg[0],$reg[1],$reg[2],$reg[3],$reg[4]);
            array_push($clientes,$c);
        }
        return $clientes;
    }

    public function insertarCliente($nom,$dir,$tel,$cor){
        $query ="INSERT INTO cliente(nombre_cliente,direccion_cliente,telefono_cliente,correo_cliente) 
                 VALUES ('$nom','$dir','$tel','$cor')";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            //printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function getCliente($idc){
        $query = "SELECT * from cliente where id_cliente = '$idc'";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n Query: %s", $error, $query);
            return $error;
        }
        $reg = mysqli_fetch_array($res);
        $cliente = new Cliente($reg[0],$reg[1],$reg[2],$reg[3],$reg[4]);

        return $cliente;
    }

    public function editarCliente($id, $nom, $dir, $tel, $cor){
        $error="";
        $query="UPDATE cliente  SET nombre_cliente = '$nom', direccion_cliente = '$dir', 
                telefono_cliente= '$tel', correo_cliente = '$cor' WHERE id_cliente = '$id'";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            //printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function eliminarCliente($idcliente){
        $query ="DELETE from cliente where id_cliente = '$idcliente'";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            //printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function getApartados(){
        $apartados = array();
        $query="SELECT * from apartado";
        $res = $this->con->ejecutar($query);
        if(!$res){
            printf("Errormessage: %s\n", mysqli_error($this->con->getCon()));
        }
        while($reg = mysqli_fetch_array($res)){
            $ap = new Apartado($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5]);
            //var_dump($ap);
            array_push($apartados,$ap);
        }
        return $apartados;
    }

    public function insertarApartado($idz,$cliente,$abono,$resta,$est){
        $query = "INSERT INTO apartado(codigo,id_cliente,ultimo_abono,saldo_restante,estatus) VALUES('$idz','$cliente','$abono','$resta','$est')";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            //printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function getApartado($ida){
        $apartado;
        $query = "SELECT * FROM apartado WHERE id_apartado = $ida";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n Query: %s", $error, $query);
            return $error;
        }
        $reg = mysqli_fetch_array($res);
        $apartado = new Apartado($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5]);

        return $apartado;
    }

    public function abonar($id, $total, $re, $est){
        $query="UPDATE apartado SET ultimo_abono = '$total', saldo_restante= '$re', estatus = '$est' WHERE id_apartado = '$id'";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function guardarVenta($idc,$ide,$total){
        $fecha = date("Y-m-d H:i:s");
        $query = "INSERT into venta values (0, '$ide','$idc',$total,'$fecha')";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            //printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function getIdVenta(){
        $query = "SELECT max(id_venta) from venta";
        $res = $this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n", $error);
        }
        $reg = mysqli_fetch_array($res);
        $idv = $reg[0];

        return $idv;
    }

    public function insertDetalleVenta($idv, $codigo, $cant){
        $query = "INSERT into detalle_venta values ('$idv', $codigo, $cant)";
        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            //printf("Errormessage: %s\n", $error);
        }
        return $error;
    }

    public function ventaDeZapatos($periodo){
        switch($periodo){
            case "mes":
                $fecha = date("n");
                $query = "SELECT z.codigo, descripcion, razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                          zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                          proveedor p on z.id_proveedor = p.id_proveedor 
                          where MONTH(fecha)=$fecha group by codigo order by vendidos desc";
                break;
            case "year":
                $fecha = date("Y");
                $query = "SELECT z.codigo, descripcion,razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                          zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                          proveedor p on z.id_proveedor = p.id_proveedor 
                          where YEAR(fecha)=$fecha group by codigo order by vendidos desc";
                break;
            case "all":
                $fecha = "";
                $query = "SELECT z.codigo, descripcion,razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                          zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                          proveedor p on z.id_proveedor = p.id_proveedor 
                          group by codigo order by vendidos desc";
                break;
            case "semana":
                $fecha = date("W");
                $query = "SELECT z.codigo, descripcion,razon_social,count(z.codigo) as vendidos from detalle_venta d inner join 
                            zapato z on d.codigo=z.codigo inner join venta on venta.id_venta = d.id_venta inner join
                          proveedor p on z.id_proveedor = p.id_proveedor 
                            where WEEK(fecha)=$fecha group by codigo order by vendidos desc";
                break;
        }

        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n Query: %s", $error, $query);
            return $error;
        }
        //$reg = mysqli_fetch_array($res);
        //$apartado = new Apartado($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5]);

        //return $apartado;
        return $res;
        
    }

    public function zapatosNoVendidos($periodo){
        switch($periodo){
            case "mes":
                $fecha = date("n");
                //select z.codigo, descripcion, razon_social, existencia from zapato z left join detalle_venta d on z.codigo = d.codigo inner join proveedor p on z.id_proveedor = p.id_proveedorwhere cantidad_venta is null
                $query = "SELECT z.codigo, descripcion, razon_social, existencia from zapato z left join 
                          detalle_venta d on z.codigo = d.codigo inner join proveedor p on 
                          z.id_proveedor = p.id_proveedor 
                          inner join venta v on v.id_venta = v.id_venta 
                          where cantidad_venta is null and MONTH(fecha)=$fecha group by z.codigo 
                          order by existencia desc;";
                break;
            case "year":
                $fecha = date("Y");
                $query = "SELECT z.codigo, descripcion, razon_social, existencia from zapato z left join 
                            detalle_venta d on z.codigo = d.codigo inner join proveedor p on 
                            z.id_proveedor = p.id_proveedor 
                            inner join venta v on v.id_venta = v.id_venta 
                            where cantidad_venta is null and YEAR(fecha)=$fecha group by z.codigo 
                            order by existencia desc;";
                break;
            case "all":
                $fecha = "";
                $query = "SELECT z.codigo, descripcion, razon_social, existencia from zapato z left join 
                            detalle_venta d on z.codigo = d.codigo inner join proveedor p on 
                            z.id_proveedor = p.id_proveedor 
                            inner join venta v on v.id_venta = v.id_venta 
                            where cantidad_venta is null group by z.codigo order by existencia desc;";
                break;
            case "semana":
                $fecha = date("W");
                $query = "SELECT z.codigo, descripcion, razon_social, existencia from zapato z left join 
                            detalle_venta d on z.codigo = d.codigo inner join proveedor p on 
                            z.id_proveedor = p.id_proveedor 
                            inner join venta v on v.id_venta = v.id_venta 
                            where cantidad_venta is null and WEEK(fecha)=$fecha group by z.codigo 
                            order by existencia desc;";
                break;
        }

        $res=$this->con->ejecutar($query);
        if(!$res){
            $error = mysqli_error($this->con->getCon());
            printf("Errormessage: %s\n Query: %s", $error, $query);
            return $error;
        }
        //$reg = mysqli_fetch_array($res);
        //$apartado = new Apartado($reg[0],$reg[1],$reg[2],$reg[3],$reg[4],$reg[5]);

        //return $apartado;
        return $res;
        
    }
/*
    public function login($usuario, $contrasenia){
      $user = mysqli_real_escape_string($this->con->getCon(), $usuario);
      $pass = md5(mysqli_real_escape_string($this->con->getCon(), $contrasenia));
      
      $query = "SELECT e.id_empleado, e.nombre_empleado, e.apellido1_empleado , e.apellido2_empleado, e.sexo, e.edad,e.rfc_empleado, e.sueldo_base,e.puesto,u.usuario, u.contraseña FROM empleado e INNER JOIN usuario u on e.id_empleado = u.id_empleado WHERE u.usuario = '$user' AND u.contraseña = '$pass'";
      $res = $this->con->ejecutar($query);
      while($reg = mysqli_fetch_array($res)){
        $c = new Compra($reg[0],$reg[1],$reg[2],$reg[3],$reg[4]);
        array_push($compras,$c);
      }
    }
*/
}
/*
$obj = new Data();
var_dump($obj->getConexion());
*/
?>