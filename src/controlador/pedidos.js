function buscarTablaPedidos(modelo){
    var input, filter, table, tr, td, i, txtValue;
    //input = document.getElementById("buscar");
    input=modelo;
    filter = input.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          trcant = tr[i].getElementsByTagName("td")[5];
          trsubtotal = tr[i].getElementsByTagName("td")[6];
          return true;
        } else {
          return false;
        }
      }
    }
  }

function eliminarZapatoComra(elmnt){
    document.getElementById("cuerpoTabla").removeChild(elmnt.parentElement.parentElement);
    const subtotal = elmnt.parentElement.parentElement.getElementsByTagName("td")[6].innerHTML;
    
    var total = document.getElementById("txtTotal").value;
    document.getElementById("txtTotal").value=parseFloat(total)-parseFloat(subtotal);
  }
  
  function guardarCompra(){
    var codigos = document.getElementById("codigos");
    var cantidades = document.getElementById("cantidades");
  
    var filas = document.getElementById("tabla").getElementsByTagName("tr");
  
    for(let i =1; i<filas.length;i++){
      var codigo = filas[i].getElementsByTagName("td")[0].innerText;
      var cantidad = filas[i].getElementsByTagName("td")[5].innerText;
      var nodoOptionCodigos = document.createElement("option");
      nodoOptionCodigos.setAttribute("value",codigo);
      nodoOptionCodigos.setAttribute("selected","selected");
      var nodoOptionCantidad = document.createElement("option");
      nodoOptionCantidad.setAttribute("value",cantidad);
      nodoOptionCantidad.setAttribute("selected","selected");
      codigos.appendChild(nodoOptionCodigos);
      cantidades.appendChild(nodoOptionCantidad);
    }
    document.getElementById("total").value=document.getElementById("txtTotal").value;
    //alert(document.getElementById("prov").value);
    document.getElementById("prov").removeAttribute("disabled");
    document.getElementById("frm").submit();
  }
  
    function desactivarP(){
      document.getElementById("prov").setAttribute("disabled","");
    }
  
    function cancelarPedido(){
      filas = document.getElementsByTagName("tr");
      for( i = 0;i<filas.length;i++){
        filas[1].remove();
      }
      $("#frm")[0].reset();
      document.getElementById("prov").removeAttribute("disabled");
      document.getElementById("txtTotal").value="";
      document.getElementById("txtTotal").innerHTML="";
    }


$(document).ready(function(){
    $("#frm")[0].reset();
    document.getElementById("txtTotal").value="";
    document.getElementById("txtTotal").innerHTML="";
    var sapato;
    var codigo;
    var precioc;
    var cantidad;
    var tallas;
    var mod;
    var descripcion;
    //$("#descripcion").load("BuscarModelo.php");
    $("#btnbuscar").click(function(){
      if(document.getElementById("prov").getAttribute("disabled")==null){
        //entonces se puede hacer todo
        return;
      }

      mod = document.getElementById("inputModelo").value;
      $.post("../controlador/BuscarModelo.php",
      {
        modelo: mod
        //city: "Duckburg"
      },
      function(data,status){
        //alert("Data: " + data + "\nStatus: " + status);
        
        if(status=="success"){
          //$("#descripcion").load("../controlador/BuscarModelo.php");
          console.log("se supone que jalo esta wea");
          datos=data.split(",");
          descripcion = datos[0];
          precioc = datos[1];
          idprov = datos[2];
          codigo = datos[3];
          tallas = [];
          for(let i = 5;i<datos.length;i++){
            tallas.push(datos[i]);
          }
          console.log(tallas);
          
          if(idprov!=document.getElementById("prov").value){
            alert("Este modelo no es del proveedor "+document.getElementById("prov").selectedOptions[0].innerHTML);
            document.getElementById("btnagregar").setAttribute("disabled","");
            return;
          }
          else{
            document.getElementById("descripcion").value=descripcion;
            document.getElementById("precioCompra").value=precioc;
            document.getElementById("stock").value=datos[4];
            document.getElementById("btnagregar").removeAttribute("disabled")
          }
          
          sapato;
        }
        
      });
      //alert("You entered p1!");
    });
    
    $("#btnagregar").click(function(){
      cantidad = document.getElementById("cantidad").value;
      if(buscarTablaPedidos(mod)){
        var nuevacant = parseInt(cantidad)+parseInt(trcant.innerText);
        var nuevosub = nuevacant*parseFloat(trsubtotal.innerText);
        trcant.innerText=nuevacant;
        trsubtotal.innerText=nuevosub;
      }
      else{
        var nodotr = document.createElement("tr");
        var nodoCod = document.createElement("td");
        var texCod = document.createTextNode(codigo);
        nodoCod.setAttribute("class","d-none");
        nodoCod.appendChild(texCod);

        var nodoMod = document.createElement("td");
        var texMod = document.createTextNode(mod);
        nodoMod.appendChild(texMod);
        var nodoDesc = document.createElement("td");
        var txtDesc = document.createTextNode(descripcion);
        nodoDesc.appendChild(txtDesc);
        var nodoTallas = document.createElement("td");
        var tls="";
        for(let i = 0; i<tallas.length;i++){
          if(i==tallas.length-1){
            tls+=tallas[i];
          }
          else{
            tls+=tallas[i]+",";
          }
        }
        var txtTallas = document.createTextNode(tls);
        nodoTallas.appendChild(txtTallas);
        var nodoPrecio = document.createElement("td");
        txtPrecio = document.createTextNode(precioc);
        nodoPrecio.appendChild(txtPrecio);
        var nodoCantidad = document.createElement("td");
        txtCant = document.createTextNode(cantidad);
        nodoCantidad.appendChild(txtCant);
        var nodoSub = document.createElement("td");
        var pc = parseFloat(precioc)*parseInt(cantidad);
        var txtSub = document.createTextNode(""+pc);
        nodoSub.appendChild(txtSub);
        var nodotrash = document.createElement("td");
        var nodoBtn = document.createElement("a");
        nodoBtn.setAttribute("class","btn btn-danger");
        nodoBtn.setAttribute("onclick","eliminarZapatoComra(this)");
        nodoIcono = document.createElement("i");
        nodoIcono.setAttribute("class","bx bx-trash")
        nodoBtn.appendChild(nodoIcono);
        nodotrash.appendChild(nodoBtn);

        nodotr.appendChild(nodoCod);
        nodotr.appendChild(nodoMod);
        nodotr.appendChild(nodoDesc);
        nodotr.appendChild(nodoTallas);
        nodotr.appendChild(nodoPrecio);
        nodotr.appendChild(nodoCantidad);
        nodotr.appendChild(nodoSub);
        nodotr.appendChild(nodotrash);
        
        document.getElementById("cuerpoTabla").appendChild(nodotr);
      }

      var filas = document.getElementById("tabla").getElementsByTagName("tr");
      total=0;
      for(let  i = 1; i<filas.length;i++){
        total+=parseFloat(filas[i].getElementsByTagName("td")[6].innerText);
      }
      document.getElementById("txtTotal").value=total;
      const selectProv = document.getElementById("prov").value;
      $("#frm")[0].reset();
      const proveedores = document.getElementById("prov").getElementsByTagName("option");
      
      document.getElementById("prov").value=selectProv;
      document.getElementById("btnagregar").setAttribute("disabled","");
    });
});