$(document).ready(function(){
    $("#periodo").change(function(){
        if(document.getElementById("periodo").getElementsByTagName("option")[0].value==""){
            document.getElementById("periodo").getElementsByTagName("option")[0].remove();
        }
        var periodo = document.getElementById("periodo").value;
        const accion = "vendidos";

        $.post("../controlador/datosReporte.php",
            {
                periodo:periodo,
                accion:accion
            },
            function(data,status){
                if(status=="success"){
                    document.getElementById("tablaVendidos").innerHTML=data;
                    var filas = document.getElementById("tablaVendidos").getElementsByTagName("tr");
                    var nose = [];
                    nose[0]=['Descripcion', 'Cantidad venidos'];
                    for(let i = 1; i<filas.length; i++){
                        nose[i] = [filas[i].getElementsByTagName("td")[1].innerText,
                        parseInt(filas[i].getElementsByTagName("td")[3].innerText)];
                    }
                    console.log(nose);


                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(nose
                        );
                        console.log(data);
                        var titulo = "";
                        if(periodo=="year"){
                            titulo="año"
                        }
                        else if(periodo=="all"){
                            titulo="Todo el tiempo"
                        }
                        else{
                            titulo = periodo;
                        }
                        var options = {
                        title: 'Zapatos vendidos por '+titulo
                        };

                        var chart = new google.visualization.BarChart(document.getElementById('grafica'));

                        chart.draw(data, options);
                    }


                }
            });

        
    });

    $("#periodoN").change(function(){
        if(document.getElementById("periodoN").getElementsByTagName("option")[0].value==""){
            document.getElementById("periodoN").getElementsByTagName("option")[0].remove();
        }
        var periodo = document.getElementById("periodoN").value;
        const accion = "noVendidos";
        $.post("../controlador/datosReporte.php",
            {
                periodo:periodo,
                accion:accion
            },
            function(data,status){
                if(status=="success"){
                    document.getElementById("tablaNoVendidos").innerHTML=data;

                    var filas = document.getElementById("tablaNoVendidos").getElementsByTagName("tr");
                    var nose = [];
                    nose[0]=['Descripcion', 'Existencia'];
                    for(let i = 1; i<filas.length; i++){
                        nose[i] = [filas[i].getElementsByTagName("td")[1].innerText,
                        parseInt(filas[i].getElementsByTagName("td")[3].innerText)];
                    }
                    console.log(nose);


                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable(nose
                        );
                        console.log(data);
                        var titulo = "";
                        if(periodo=="year"){
                            titulo="el año"
                        }
                        else if(periodo=="all"){
                            titulo="Todo el tiempo"
                        }
                        else if(periodo=="semana"){
                            titulo="la semana"
                        }
                        else if(periodo=="mes"){
                            titulo="el mes"
                        }
                        var options = {
                        title: 'Zapatos sin vender en '+titulo
                        };

                        var chart = new google.visualization.BarChart(document.getElementById('graficaN'));

                        chart.draw(data, options);
                    }
                }
            });
    });


});