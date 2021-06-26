<?php
require_once "Conexion.php";
require_once "zapato.php";
require_once "proveedor.php";
require_once "Compra.php";
require_once "DetalleCompra.php";
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