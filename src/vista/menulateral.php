<!-- creacion del codigo php -->
<?php
// creacion de la conexion 
include "../modelo/Data.php";
//sesion activa;
session_start();
 //si la sesion no esta activa entonces te regresa a login  
if (empty($_SESSION['active'])) {
  header('location: Login.php');



}

?>

<style type="text/css">
        .navigation ul li:hover{
            background: #13DDB2;
        }
</style>

<div class="navigation">
           

         <ul  >
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
                                <span class="user-name"><strong>
                                    <!-- imprimir mediante php la sesion guardada de nombre y apellido paterno -->
                                       <?php echo $_SESSION['Nombre']; ?>  <?php echo $_SESSION['Ape1']; ?></strong><br>
                                </span>
                                <!-- imprimir mediante php la sesion guardada de puesto -->
                                <span class="user-role"  ><?php echo $_SESSION['puesto']; ?></span>
                                </span>
                                
                                
            </div>
            

             <div class="texto1">
                <h2>Generales</h2>
             </div>


             <li>
                 <a href="Principal-admin.php">
                    <span class="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                    <span class="title">Inicio</span>
                 </a>


             </li>



             <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  || $_SESSION['puesto'] == 'Cajero') { ?>
             <li>
                 <a href="ventas.php">
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <span class="title">Punto de venta</span>
                 </a>


             </li>
             <?php }else{ ?>
                <li>
                     <a href="Principal-admin.php">
                        <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        <span class="title">Punto de venta</span>
                     </a>


                 </li>
             <?php } ?>

             <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  || $_SESSION['puesto'] == 'Cajero') { ?>

             <li>
                 <a href="listadocliente.php">
                    <span class="icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    </span>
                    <span class="title">Clientes</span>
                 </a>


             </li>
             <?php }else{ ?>

                 <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    </span>
                    <span class="title">Clientes</span>
                 </a>


             </li>
               <?php } ?>


             <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  || $_SESSION['puesto'] == 'Almacenista' ||  $_SESSION['puesto'] == 'Cajero') { ?>
             <li>
                 <a href="Zapatos.php">
                    <span class="icon"><i class="fa fa-university" aria-hidden="true"></i></span>
                    <span class="title">Inventario</span>
                 </a>


             </li>
         <?php }else{  ?>

            <li>
                 <a href="Principal-admin.php">
                    <span class="icon"><i class="fa fa-university" aria-hidden="true"></i></span>
                    <span class="title">Inventario</span>
                 </a>


             </li>
            <?php } ?> 

            
             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>
                    <span class="title">Reportes</span>
                 </a>


             </li>

             <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente'  ||  $_SESSION['puesto'] == 'Cajero') { ?>

             <li>
                 <a href="Apartado.php">
                    <span class="icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                    <span class="title">Apartado </span>
                 </a>


             </li>
         <?php } else{ ?>

            <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                    <span class="title">Apartado </span>
                 </a>


             </li>


         <?php } ?> 



             <!-- si la seccion es administrador entras a la direccion con extencion caja-admin.php -->
              <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Generente') { ?>
             <li>
                 <a href="caja-admin.php">
                    <span class="icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                    <span class="title">Cajero</span>
                 </a>


             </li>
             <!-- en caso contrario se redirige a la misma pagina principal  -->
             <?php } else{ ?>
            <li>
                 <a href="Principal-admin.php">
                    <span class="icon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                    <span class="title">Cajero</span>
                 </a>


             </li>
             <?php  }?>




             <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-retweet" aria-hidden="true"></i></span>
                    <span class="title">Devoluciones<span class="badge badge-pill badge-primary"> Prox </span></span>
                 </a>


             </li>

             <!-- si la seccion es administrador entras a la direccion con extencion caja-admin.php -->
             <?php if ($_SESSION['puesto'] == 'Administrador') { ?>
              <li>
                 <a href="Usuario-administrador.php">
                    <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <span class="title">Usuarios</span>
                 </a>
      
             </li>
             <!-- en caso contrarrio se redirige a la misma pagina principal  -->
              <?php } else{ ?>
                <li>
                 <a href="Principal-admin.php">
                    <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <span class="title">Usuarios</span>
                 </a>
       

             </li>
            <?php  }?>

            <?php if ($_SESSION['puesto'] == 'Administrador' || $_SESSION['puesto'] == 'Almacenista') { ?>
              <li>
                 <a href="#">
                    <span class="icon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                    <span class="title">Provedores</span>
                 </a>
              <?php }else{ ?>   
                <li>
                 <a href="Principal-admin.php">
                    <span class="icon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                    <span class="title">Provedores</span>
                 </a>
             <?php } ?>

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
                 <a href="../controlador/salir.php">
                    <span class="icon"><i class="fa fa-power-off" aria-hidden="true"></i></span>
                    <span class="title">Cerrar sesion</span>
                 </a>


             </li>

         </ul>
        
        

     </div>

      