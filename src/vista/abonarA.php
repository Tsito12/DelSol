 <?php 
   //include "conexion.php";
   require_once "../modelo/Data.php";
   session_start();
  
          if (empty($_SESSION['active'])) {
           header('location: Login.php');



          }
        else if (!empty($_POST))
       {

        $alert=" ";
        $id = $_GET['id'];
        $abo = $_POST['abono'];
        $abo1 = $_POST['abonoA'];
        $total = $_POST['totalA'];
        $sal = $_POST['sal'];
        $re = $_POST['re'];
        $est = $_POST['estatus'];
        
       

          $error = "";
          //$sql_update =  mysqli_query($conectar, "UPDATE apartado SET ultimo_abono = '$total', saldo_restante= '$re', estatus = '$est' WHERE id_apartado = '$id'");
          $d = new Data();
          //var_dump($d);
          $error = $d->abonar($id, $total, $re, $est);
        
          

       
          if($error==""){
            
            $alert = ' <p class="msg_save"> Datos actualizados correctos </p> ';
          }else{
            
            $alert = '<p class"msg_error"> Error al actualizar  el apartado </p>';
          } 
      

  } 
  
      
       

  

  //mostrar datos
   if (empty($_GET['id'])) {
      header('Location: Apartado.php');
    }
    $ida = $_GET['id'];
    $d = new Data();
    $apartado = $d->getApartado($ida);
    /*$sql_a = mysqli_query($conectar,"SELECT *
      FROM apartado WHERE id_apartado = $iduser ");

    $result_sql = mysqli_num_rows($sql_a);
    */
    if ($apartado->getIdApartado()==null) {
      header('Location: Apartado.php');

    }else{
      $option = '';
      //while ($data = mysqli_fetch_array($sql_a)) {
        # code...
        /*
        $idA = $data['id_apartado'];
        $codZ= $data['codigo'];
        $precio = $data['Precio_p'];
        $cliente = $data['id_cliente'];
        $abono = $data['ultimo_abono'];
        $restante = $data['saldo_restante'];
        $est = $data['estatus'];
        */
        $idA = $apartado->getIdApartado();
        $codZ= $apartado->getCodigo();
        $cliente = $apartado->getIdCliente();
        $abono = $apartado->getUltimoAbono();
        $restante = $apartado->getSaldoRestante();
        $est = $apartado->getStatus();
       
         
            
          //}
      }

    

?>                               

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="../Style/edicss.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
                      
      </script>
      
      

      <title>Abonar Apartado</title>

      <script type="text/javascript">
         function sum()
     {

        var number1 = document.getElementById('num1').value;
        var number2 = document.getElementById('num2').value;
        var number3 = document.getElementById('precio').value;
        var restante = document.getElementById("saldoRestante").value;

        if (number1 == '') {
           number1 = 0
           var num3 = parseInt(number1) + parseInt(number2);
           document.getElementById('result').value = num3;
           //var num4 = parseInt(num3) - parseInt(number3);
           var num4 = parseInt(restante) - parseInt(number2);
           document.getElementById('totalR').value = num4;

        }
        else if(number2 == '')
        {
           number2 = 0;
           var num3 = parseInt(number1) + parseInt(number2);
           document.getElementById('result').value = num3;
           //var num4 = parseInt(num3) - parseInt(number3);
           var num4 = parseInt(restante) - parseInt(number2);
           document.getElementById('totalR').value = num4;
        }
        else
        {
           var num3 = parseInt(number1) + parseInt(number2);
           document.getElementById('result').value = num3;
           //var num4 = parseInt(number3) - parseInt(num3);
           var num4 = parseInt(restante) - parseInt(number2);
           document.getElementById('totalR').value = num4;
        }

     }
            

            
      </script>
      
  </head>
<body style=" background:   #C5FEFE; ">
   <form  class="f form-register" action="" method="post">
     <div class="tit" ><h1  class="text-center">ABONAR</h1></div>
  
    <h4>Abono al Apartado</h4>
      <input  type="hidden"  name="id" value="<?php echo $iduser; ?>" 
       >
       <label ><h4>Precio del zapato $<?php echo $precio; ?></h4></label>
      <br>
      <span>Abono anterior</span>
        <input type="number" name="abono" value="<?php echo $abono; ?>" id="num1" class="monto controls" onchange="sum();" />
        <br/>

        <span>Abono Actual</span>
        <input type="number" name="abonoA" id="num2" class="monto controls" onchange="sum();" />
        <br/>
           
  
        
      <span>Total a abonar </span>
        <input type="number" name="totalA" class="resulado controls" id="result" value="0" readonly onchange="sum();" /><br/>

      
        <input  type="hidden" class="Resultado controls" name="sal" value="<?php echo $precio; ?>" id="precio" onchange="sum();" ><br/>
        <input id="saldoRestante" class="d-none" value="<?php echo $restante; ?>"/>
       
        <span>Saldo restante</span>
        <input value="<?php echo $restante; ?>" class="controls" name="re" id="totalR" readonly />
        <br/>
        <span>Estatus</span>
        <select class="controls" value="estatus" name="estatus">
            <option value="Pendiente" ><?php echo $est;  ?> </option>
            <option value="Liquidado">Liquidado</option>
        </select>
        
      

      <div ><?php echo isset($alert) ? $alert : ''; ?></div>
      <input class="btn  btn-primary" type="submit" value="Aceptar"> |
      <a href="Apartado.php" class="btn  btn-primary" type="submit" > Cerrar </a>

  
 </form>
</body>
</html>

