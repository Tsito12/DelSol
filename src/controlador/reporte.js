$(document).ready(function(){
    $("#periodo").change(function(){
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
                }
            });
    });

    $("#periodoN").change(function(){
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
                }
            });
    });


});