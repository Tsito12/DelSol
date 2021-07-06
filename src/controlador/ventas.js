$(document).ready(function(){

    var box = paginator({
        table: document.getElementById("abr").getElementsByTagName("table")[0],
        box_mode: "list",
        rows_per_page: 2
      });
      box.className = "box";
      document.getElementById("barra").appendChild(box);

    $("#tex_cod_producto").keydown(function(){
        var e = event || window.event;  // get event object
        var key = e.keyCode || e.which; // get key cross-browser
        if(key==13){
            console.log(key);
            var codigo = document.getElementById("tex_cod_producto").value;
            const accion = "buscarZapato";
            $.post("../controlador/datosVenta.php",
            {
                codigo:codigo,
                action:accion
            },
            function(data,status){
                if(status=="success"){
                    var sapato = data.split("/");
                    document.getElementById("text_Modelo").innerText=sapato[1];
                    document.getElementById("text_decripcion").innerText=sapato[2];
                    document.getElementById("text_existencia").innerText=sapato[3];
                    document.getElementById("text_precio").innerText=sapato[4];
                    if(sapato[1]!==""){
                        document.getElementById("text_cant_producto").removeAttribute("disabled");
                        document.getElementById("add_product_venta").style="display:flex";
                    }
                }
            });

        }
    });

    $("#nit_cliente").keydown(function(){
        var e = event || window.event;  // get event object
        var key = e.keyCode || e.which; // get key cross-browser
        if(key==13){
            console.log(key);
            var idc = document.getElementById("nit_cliente").value;
            const action = "buscarCliente";
            $.post("../controlador/datosVenta.php",
            {
                idc:idc,
                action:action
            },
            function(data,status){
                if(status=="success"){
                    var cliente = data.split("/");
                    document.getElementById("nom_cliente").value=cliente[1];
                    document.getElementById("dir_cliente").value=cliente[2];
                    document.getElementById("tel_cliente").value=cliente[3];
                    document.getElementById("cor_cliente").value=cliente[4];
                }
            });
        }
    });

    $("#text_cant_producto").keyup(function(){
        const cant = document.getElementById("text_cant_producto").value;
        const exis = document.getElementById("text_existencia").innerText;
        if ((cant>0)&&(cant<=parseInt(exis))){

            const precio_u = document.getElementById("text_precio").innerText;
            var subtotal = parseFloat(precio_u)*parseInt(cant);
            document.getElementById("text_precio_total").innerText=subtotal;
            document.getElementById("add_product_venta").style="display:flex";
        }
        else{
            document.getElementById("add_product_venta").style="display:none";
            document.getElementById("text_precio_total").innerText="Existencia insuficiente";
        }
    });

    $("#add_product_venta").click(function(){
        var codigo = document.getElementById("tex_cod_producto").value;
        var modelo = document.getElementById("text_Modelo").innerText;
        var desc = document.getElementById("text_decripcion").innerText;
        var cant = document.getElementById("text_cant_producto").value;
        var precio = document.getElementById("text_precio").innerText;
        var preciot = document.getElementById("text_precio_total").innerText;
        console.log(parseInt(cant));
        
        if(parseInt(cant)>0){
            cantidad = document.getElementById("text_cant_producto").value;
            if(buscarTablaVentas(codigo)){
                var nuevacant = parseInt(cantidad)+parseInt(trcant.innerText);
                var nuevosub = nuevacant*parseFloat(trsubtotal.innerText);
                trcant.innerText=nuevacant;
                trsubtotal.innerText=nuevosub;
            }
            else{
                document.getElementById("tex_cod_producto").value="";
                document.getElementById("text_Modelo").innerText="-";
                document.getElementById("text_decripcion").innerText="-";
                document.getElementById("text_cant_producto").value="";
                document.getElementById("text_precio").innerText="-";
                document.getElementById("text_precio_total").innerText="-";
                document.getElementById("text_existencia").innerText="-";
                agregarProducto(codigo, modelo, desc, cant, precio, preciot);
            }
            var total = actualizarTotal();
            var iva = obtenerIva(total);
            var subtotal = total-iva;
            document.getElementById("subtotal").innerText="Subtotal: "+subtotal;
            document.getElementById("iva").innerText="IVA :"+iva;
            document.getElementById("total").innerText="Total: "+total;
            document.getElementById("add_product_venta").style="display:none";
            document.getElementById("btn_facturar_venta").style="display:flex";
        }
    
    });

    

    $("#btn_facturar_venta").click(function(){
        const ide = document.getElementById("idEmpleado").innerText;
        var idc = document.getElementById("nit_cliente").value;
        var filas = document.getElementById("detalle_ventas").getElementsByTagName("tr");
        var codigos = new Array(filas.length);
        var cantidades = new Array(filas.length);
        for(let i = 0; i < filas.length; i++){
            codigos[i] = filas[i].getElementsByTagName("td")[0].innerText;
            cantidades[i] = filas[i].getElementsByTagName("td")[3].innerText;
        }
        if(idc==""){
            idc="C0000000";
        }
        var total = document.getElementById("total").innerText;
        total = total.split(" ")[1];
        const action = "guardarVenta";
        $.post("../controlador/datosVenta.php",
            {
                idc:idc,
                action:action,
                ide:ide,
                codigos: codigos,
                cantidades:cantidades,
                total:total
            },
            function(data,status){
                if(status=="success"){
                    console.log(data);
                    document.getElementById("error").innerText=data;
                    if(data===""||data==null||data==" "){
                        anular();
                    }
                }
            });

            
    });

    function agregarProducto(codigo, modelo, desc, cant, precio, preciot){
        var cols = [codigo, modelo, desc, cant, precio, preciot];
        var tr = document.createElement("tr");
        for(let i = 0;i<cols.length;i++){
            var td = document.createElement("td");
            var txt = document.createTextNode(cols[i]);
            td.appendChild(txt);
            tr.appendChild(td);
        }
        var td = document.createElement("td");
        var btn = document.createElement("button");
        btn.setAttribute("class","btn btn-danger");
        btn.setAttribute("onclick","eliminar(this)");
        var icono = document.createElement("i");
        icono.setAttribute("class","fa fa-trash");
        icono.setAttribute("aria-hidden","true");
        btn.appendChild(icono);
        td.appendChild(btn);
        tr.appendChild(td);
        document.getElementById("detalle_ventas").appendChild(tr);
    }

    
});

function actualizarTotal(){
    var tabla = document.getElementById("detalle_ventas");
    var filas = tabla.getElementsByTagName("tr");
    const nfilas = filas.length;
    var total = 0;
    for(let i = 0; i < nfilas; i++){
        var cols = filas[i].getElementsByTagName("td");
        total+=parseFloat(cols[5].innerText);
    }
    return total;
}

function obtenerIva(total){
    var iva = parseFloat(total)*0.16;
    return iva;
}

function eliminar(elmnt){
    elmnt.parentElement.parentElement.remove();
    var tabla = document.getElementById("detalle_ventas");
    var tr = tabla.getElementsByTagName("tr");

    var total = actualizarTotal();
    var iva = obtenerIva(total);
    var subtotal = total-iva;
    document.getElementById("subtotal").innerText="Subtotal: "+subtotal;
    document.getElementById("iva").innerText="IVA :"+iva;
    document.getElementById("total").innerText="Total: "+total;

    if(tr.length<1){
        document.getElementById("btn_facturar_venta").style="display:none";
        document.getElementById("subtotal").innerText="";
        document.getElementById("iva").innerText="";
        document.getElementById("total").innerText="";
    }
}

function buscarTablaVentas(modelo){
    var input, filter, table, tr, td, i, txtValue;
    //input = document.getElementById("buscar");
    input=modelo;
    filter = input.toUpperCase();
    table = document.getElementById("detalle_ventas");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      console.log("codigo buscado: "+td.innerText)
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase()===(filter)) {
          trcant = tr[i].getElementsByTagName("td")[3];
          trsubtotal = tr[i].getElementsByTagName("td")[5];
          return true;
        } /*else {
          return false;
        }*/
      }
    }
    return false;
  }

function anular(){
    var tabla = document.getElementById("detalle_ventas");
    var tr = tabla.getElementsByTagName("tr");
    const filas = tr.length;
    for(let i = 0; i < filas    ; i++){
        console.log("Filas"+tr.length);
        tr[0].remove();
    }
    document.getElementById("btn_facturar_venta").style="display:none";
    document.getElementById("subtotal").innerText="";
    document.getElementById("iva").innerText="";
    document.getElementById("total").innerText="";
}