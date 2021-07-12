<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
   

    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Style/Ausuario.css">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">-->
</head>
<body>
    <div class="wrapper">
        <?php include "menulateral.php"; ?>
        <div class="main_content container-responsive">
            <div class="cuerpo" style="">
                <div class="container p-5">
                    <div class="row">
                    <div class="col-12 col-sm-10"></div>
                    <div class="sesion col-12 col-sm-2 "> <a href="../controlador/salir.php">
                        <span class=" btn btn-danger btn-sm" type="submit"> Cerrar Sesion
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </span></a>
                    </div>
                    <div class=" col-12">
                        <img src="../imgZ/documento.svg" class="imgR" width="200" height="150" alt="avatar">
                        <p><br>Reportes</p>
                    </div>

                   
                        
                    <div class="col-6 col-md-6"></div>
                      <div class="col-12 col-md-12 tit">
                       <h1>Contenido<h1>
                      </div>
                    </div>
                    <br>
                    <div id="pdfVend">
                    <div class="col-12">
                        <h4>Lista de la cantidad de zapatos vendidos</h4>
                        <label for="periodo">Periodo</label>
                        <select name="periodo" id="periodo">
                            <option value="">Elige un periodo de tiempo</option>
                            <option value="semana">Semana</option>
                            <option value="mes">Mes</option>
                            <option value="year">Año</option>
                            <option value="all">Todo el tiempo</option>
                        </select>
                    </div>
                    <div class="row">
                    <div class="col-6">
                    <div class="table-responsive col-4">
                            <table class="table table-hover" >
                              <thead class="thead-dark ">
                                <tr >
                                  <th scope="col">Codigo</th>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Proveedor</th>
                                  <th scope="col">Vendidos</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo" id="tablaVendidos">
                                
                                  
                              </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="grafica" class="col-6">
                                </div>

                                <div class="col-6 text-center">
                                    <a  class="btn btn-primary" target="_blank" onclick="printJS('pdfVend', 'html')">Generar PDF</a>
                                </div>
                    </div>
                    
                    
                        


                                

                    </div>
                    
                        <div id="abr">
                        <div class="col-12">
                        
                        <h4>Lista de la cantidad de zapatos no vendidos</h4>
                        <label for="periodo">Periodo</label>
                        <select name="periodoN" id="periodoN">
                            <option value="">Elige un periodo de tiempo</option>
                            <option value="semana">Semana</option>
                            <option value="mes">Mes</option>
                            <option value="year">Año</option>
                            <option value="all">Todo el tiempo</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        <div class="table-responsive">
                            <table class="table table-hover" >
                              <thead class="thead-dark ">
                                <tr >
                                  <th scope="col">Codigo</th>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Proveedor</th>
                                  <th scope="col">Existencia</th>
                                </tr>
                              </thead>
                              <tbody class="tcuerpo" id="tablaNoVendidos">
                                
                                  
                              </tbody>
                            </table>
                        </div>
                        </div>
                        <div id="graficaN" class="col-6">

                                </div>
                        <div class=" col-6 text-center">
                                    <a  class="btn btn-primary" target="_blank" onclick="printJS('abr', 'html')">Generar PDF</a>
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
    <script src="../controlador/reporte.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</body>
</html>