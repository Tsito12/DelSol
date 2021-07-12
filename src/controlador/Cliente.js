function editar(elmnt){
    var idc = elmnt.parentElement.parentElement.getElementsByClassName("idc")[0].innerHTML;
    document.getElementById("idc").value=idc;
    document.getElementById("frm").submit();
}

function eliminar(elmnt){
    var idc = elmnt.parentElement.parentElement.getElementsByClassName("idc")[0].innerHTML;
    document.getElementById("idu").value=idc;
    document.getElementById("frmEliminar").submit();
}

function buscarTabla(){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("buscar");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  function vacio(elmnt){
    const text = elmnt.value;
    var nododiv = elmnt.parentElement.getElementsByClassName("vacio")[0];
    if(text==""){
      //alert("esta wea esta vacía");
      
      nododiv.innerHTML="Se debe llenar este campo";
      //var p = document.createElement("p");
      //const txtp = document.createTextNode("Se debe llenar este campo");
      //p.appendChild(txtp);
      //nododiv.appendChild(p);
      return true;
    }
    else{
      nododiv.innerHTML="";
      return false;
    }
  }

  function comprobarRFC(elmnt){
    if(!vacio(elmnt)){
      var re = '^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$'; 
      var telefono = document.getElementById("rfc").value;
      var botong = document.getElementById("btnguardar");
      var OK = telefono.match(re);
      console.log(OK);
      var clase = botong.className;
      clase.replaceAll("d-none","");
      var clasd = clase+" d-none";
      var nododiv = elmnt.parentElement.getElementsByClassName("vacio")[0];
      if(OK!=null && OK[0] === telefono){
        //botong.className=clase;
        botong.removeAttribute("disabled");
        nododiv.innerText="";
      }
      else{
        //botong.className=clasd;
        botong.setAttribute("disabled","disabled");
        nododiv.innerText="Introducir un rfc válido";
      }
    }
  }