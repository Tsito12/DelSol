
<?php
//llamar a la conecion php
//include "conexion.php";
//creacion de un codigo php pera hacer una consulta de empleado 
//$queri = mysqli_query($conectar, "SELECT * FROM empleado");


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" contenet="width=decice-whith, initial-scale=1.0">
    
    <title>Principal Admin</title>
      <link rel="stylesheet" type="text/css" href="../Style/Sprincipal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
  


    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <style type="text/css">
    
        .h1{

        }
        a {
              text-decoration: none;

        }

        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
          .article p {
            font-size: 20px;
          position: relative;
          display: block;
          padding: 0px 5px;
          text-align: center;
          color: #030249;
          margin-bottom: 1px;

          }
    </style>

</head>
<body >
    <div class="wrapper">
        <!--Lo que hace este codigo es llamar el codigo de menu lateral e insertarlo ahi por medio de la extencion php  -->
     <?php include "menulateral.php"; ?>
     <div class="main_content container-responsive">
            <div class="header"> <div><h1 class="h1" style="color:#02FBEC";>Bienvenidos a la Zapateria "DEL SOL"</h1></div> 
            </div>
            <div class="cuerpo" style=" background:   #0c0c42; "><br>
                
               <div class="container p-5">
                <div class="row">
                    <div class="col-9"> </div>
                    <!-- En este codigo lo que se hace es mediante la sesion ya creada se obtiene el valor y mediante el codigo php se imprime el tipo de puesto que se tiene -->
                    <div class="col-3"> <font face="univers" size="4" color="#FFFFFF"> 
                        Usuario: <?php echo $_SESSION['puesto']; ?> 
                     </font></div>
                    <div class="col-12"> <br></div>


                    <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  || $_SESSION['puesto'] == 'Almacenista' ||  $_SESSION['puesto'] == 'Cajero') { ?>
                    <div class="form-group col-12 col-md-3 ">
                        <div class="article">
                            <a href="Zapatos.php" >
                                <img src="../imgZ/factura.svg"  width="400" height="250" alt="" >
                                <p>Inventario</p>
                            </a>
                        </div>
                    </div>
                   <?php }  ?>

                   <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  || $_SESSION['puesto'] == 'Cajero') { ?>
                    <div class="form-group col-12 col-md-3">
                        <div class="article">
                            <a href="ventas.php">
                                <img src="../imgZ/carro-de-la-compra.svg"  width="400" height="250" alt="">
                                <p>Punto de Venta</p>
                            </a>
                        </div>
                    </div>
                    <?php }  ?>



                    <div class="form-group col-12 col-md-3">
                        <div class="article">
                            <a href="reportes.php">
                                <img src="../imgZ/reporte.svg"  width="400" height="250" alt="">
                                <p>Reportes</p>
                            </a>
                        </div>
                    </div>
                    
                    
                    <!--En este codigo de php lo que se hace es que si la sesion es Administrador puede al darle click puede entrar al apartado de cajero -->
                    <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente') { ?>
                    <div class="form-group col-12 col-md-3">
                        <div class="article">
                            <a href="Caja-admin.php">
                                <img src="../imgZ/caja-registradora.svg" width="400" height="250" alt="">
                                <p>Cajero</p>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    

                    
                    <div class="form-group col-12  col-md-3">
                        <div class="article">
                            <a href="#">
                                <img src="../imgZ/devolucion-de-dinero.svg" width="400" height="250" alt="">
                                <p>Devoluciones <span class="badge badge-pill badge-primary"> Prox </span></p>
                            </a>
                        </div>
                    </div>
             



                <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Almacenista') { ?>
                    <div class="form-group col-12 col-md-3">
                        <div class="article">
                            <a href="Proveedor-Administrador.php" style="text-decoration:none">
                                <img src="../imgZ/proveedor.svg " width="400" height="250" alt="">
                                <p>Proveedores</p>
                            </a>
                        </div>
                    </div>
                     <?php } ?>                   
                        
                        
                      <!--En este codigo de php lo que se hace es que si la sesion es Administrador al dar click puede entrar al apartado de la creacion de usuario -->
                     <?php if ($_SESSION['puesto'] == 'Administrador') { ?>
                    <div class="form-group col-12 col-md-3">
                        <div class="article">
                            <a href="Usuario-Administrador.php">
                                <img src="../imgZ/grupo.svg" width="400" height="250" alt="">
                                <p>Usuarios</p>
                            </a>
                        </div>
                    </div>
                    
                <?php } ?>

                <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  || $_SESSION['puesto'] == 'Cajero') { ?>
                    
                  <div class="form-group col-12  col-md-3">
                        <div class="article">
                            <a href="listadocliente.php">
                                <img src="../imgZ/cliente.svg" width="400" height="250" alt="">
                                <p>Clientes</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  || $_SESSION['puesto'] == 'Cajero') { ?>
                    
                  <div class="form-group col-12  col-md-3">
                        <div class="article">
                            <a href="Apartado.php">
                                <img src="../imgZ/zapatos.svg" width="400" height="250" alt="">
                                <p>Apartados</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>

                            
                    <div class="form-group col-12 col-md-3">
                        <div class="article">
                            <a href="">
                                <img src="../imgZ/pregunta.svg" width="400" height="250" alt="">
                                <p>Ayuda <span class="badge badge-pill badge-primary"> Prox </span></p>
                            </a>
                        </div>
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
 

</body>
</html>