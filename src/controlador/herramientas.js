var trcant;
var trsubtotal;
function editar(elmnt){
    var codigo = elmnt.parentElement.parentElement.getElementsByClassName("codigo")[0].innerHTML;
    var descripcion = elmnt.parentElement.parentElement.getElementsByClassName("descripcion")[0].innerHTML;
    var modelo = elmnt.parentElement.parentElement.getElementsByClassName("modelo")[0].innerHTML;
    var color = elmnt.parentElement.parentElement.getElementsByClassName("color")[0].innerHTML;
    var tallas = elmnt.parentElement.parentElement.getElementsByClassName("tallas")[0].innerHTML;
    var precio_v = elmnt.parentElement.parentElement.getElementsByClassName("precio_v")[0].innerHTML;
    var precio_c = elmnt.parentElement.parentElement.getElementsByClassName("precio_c")[0].innerHTML;
    var imagen = elmnt.parentElement.parentElement.getElementsByClassName("imagen")[0].innerHTML;
    var existencia = elmnt.parentElement.parentElement.getElementsByClassName("existencia")[0].innerHTML;
    var id_prov = elmnt.parentElement.parentElement.getElementsByClassName("proveedor")[0].innerHTML;
    console.log(descripcion);
    //seleccionar las tallas en el select multiple
    console.log(tallas);
    const nospace=tallas.replaceAll(" ","");
    const sizes = nospace.split(",");
    console.log(sizes);
    const select = document.getElementById('talla');

    for (const option of document.querySelectorAll('#talla option')) {

        /* Parse value to integer */
        const value = Number.parseInt(option.value);
      
        /* If option value contained in values, set selected attribute */
        if (sizes.indexOf(option.value) !== -1) {
            console.log(option.value);
          option.setAttribute('selected',"selected");
        }
        /* Otherwise ensure no selected attribute on option */
        else {
          option.removeAttribute('selected');
        }
    }
    
    $.each(nospace.split(","), function(i,e){
      $("#talla option[value='" + e + "']").prop("selected", true);
    });
    

    document.getElementById("editar").value = "editar";

    //poner los valores de los demas atributos del sapato
    console.log(document.getElementById("editar").value);
    //document.getElementById("descripcion").value = descripcion;
    document.getElementById("descripcion").value = descripcion;
    document.getElementById("modelo").value = modelo;
    document.getElementById("color").value = color;
    //document.getElementById("talla").value = tallas;
    document.getElementById("preciov").value = precio_v;
    document.getElementById("precioc").value = precio_c;
    //document.getElementById("imagen").value = imagen;
    document.getElementById("existencia").value = existencia;
    document.getElementById("proveedor").value = id_prov;
    
    document.getElementById("codigo").value=codigo;

    console.log(document.getElementById("codigo").value);

}

function eliminar(elmnt){
  var codigoe = elmnt.parentElement.parentElement.getElementsByClassName("codigo")[0].innerHTML;
  var descripcion = elmnt.parentElement.parentElement.getElementsByClassName("descripcion")[0].innerHTML;
    var modelo = elmnt.parentElement.parentElement.getElementsByClassName("modelo")[0].innerHTML;
    var color = elmnt.parentElement.parentElement.getElementsByClassName("color")[0].innerHTML;
    var tallas = elmnt.parentElement.parentElement.getElementsByClassName("tallas")[0].innerHTML;
    var precio_v = elmnt.parentElement.parentElement.getElementsByClassName("precio_v")[0].innerHTML;
    var precio_c = elmnt.parentElement.parentElement.getElementsByClassName("precio_c")[0].innerHTML;
    var imagen = elmnt.parentElement.parentElement.getElementsByClassName("imagen")[0].innerHTML;
    var existencia = elmnt.parentElement.parentElement.getElementsByClassName("existencia")[0].innerHTML;
    var id_prov = elmnt.parentElement.parentElement.getElementsByClassName("proveedor")[0].innerHTML;
    const nospace=tallas.replaceAll(" ","");
    const sizes = nospace.split(",");
    console.log(sizes);
    const select = document.getElementById('talla');

    for (const option of document.querySelectorAll('#talla option')) {

        /* Parse value to integer */
        const value = Number.parseInt(option.value);
      
        /* If option value contained in values, set selected attribute */
        if (sizes.indexOf(option.value) !== -1) {
            console.log(option.value);
          option.setAttribute('selected',"selected");
        }
        /* Otherwise ensure no selected attribute on option */
        else {
          option.removeAttribute('selected');
        }
    }
    
    $.each(nospace.split(","), function(i,e){
      $("#talla option[value='" + e + "']").prop("selected", true);
    });

    //poner los valores de los demas atributos del sapato
    //document.getElementById("descripcion").value = descripcion;
    document.getElementById("descripcion").value = descripcion;
    document.getElementById("modelo").value = modelo;
    document.getElementById("color").value = color;
    //document.getElementById("talla").value = tallas;
    document.getElementById("preciov").value = precio_v;
    document.getElementById("precioc").value = precio_c;
    //document.getElementById("imagen").value = imagen;
    document.getElementById("existencia").value = existencia;
    document.getElementById("proveedor").value = id_prov;

  document.getElementById("editar").value = "borrar";
  console.log(document.getElementById("editar").value);
  document.getElementById("codigo").value=codigoe;
    console.log(codigoe);
    document.getElementById("formulario").submit();
}

function limpiar(){
  document.getElementById("editar").value = "";
  document.getElementById("codigo").value = "";

  for (const option of document.querySelectorAll('#talla option')) {
    option.removeAttribute('selected');
  }

  //poner los valores de los demas atributos del sapato
  //document.getElementById("descripcion").value = descripcion;
  document.getElementById("descripcion").value = "";
  document.getElementById("modelo").value = "";
  document.getElementById("color").value = "";
  document.getElementById("talla").value = "";
  document.getElementById("preciov").value = "";
  document.getElementById("precioc").value = "";
  document.getElementById("imagen").value = "";
  document.getElementById("existencia").value = "";
  document.getElementById("proveedor").value = "";
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

function soloNumeros(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  if ((key < 48 || key > 57) && key!=8 && (key < 96 || key > 105)) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function soloLetras(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  if ((key < 65 || key > 90) && key!=8 ) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function letrasNumeros(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  if ((key < 65 || key > 90) && key!=8 && (key < 48 || key > 57)) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function letrasNumerosRaro(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  if ((key < 65 || key > 90) && key!=8 && (key < 48 || key > 57) && key!=192 && key!=59 && key!=32) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function numerosPunto(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  if ((key < 48 || key > 57) && key!=8 && key!=110 && key!=190 && (key < 96 || key > 105)) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function verprecios(){
  var re = /[0-9]{1,6}((.\d(\d)?)?)/;
  var precio_c = document.getElementById("precioc").value;
  var botong = document.getElementById("btnguardar");
  var OK = precio_c.match(re);
  console.log(OK);
  var clase = botong.className;
  clase.replaceAll("d-none","");
  var clasd = clase+" d-none";
  if(OK!=null && OK[0] === precio_c){
    //botong.className=clase;
    botong.removeAttribute("disabled");
  }
  else{
    //botong.className=clasd;
    botong.setAttribute("disabled","disabled");
  }
}

function comprobarPrecios(elmnt){
  if(!vacio(elmnt)){
    verprecios();
  }

}

function verpreciosV(){
  var re = /[0-9]{1,6}((.\d(\d)?)?)/;
  var precio_c = document.getElementById("preciov").value;
  var botong = document.getElementById("btnguardar");
  var OK = precio_c.match(re);
  console.log(OK);
  var clase = botong.className;
  clase.replaceAll("d-none","");
  var clasd = clase+" d-none";
  if(OK!=null && OK[0] === precio_c){
    //botong.className=clase;
    botong.removeAttribute("disabled");
  }
  else{
    //botong.className=clasd;
    botong.setAttribute("disabled","disabled");
  }
}

function comprobarPreciosV(elmnt){
  if(!vacio(elmnt)){
    verpreciosV();
  }

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




function editarProv(elmnt){
  var idp = elmnt.parentElement.parentElement.getElementsByClassName("id_prov")[0].innerHTML;
  var razon_social = elmnt.parentElement.parentElement.getElementsByClassName("razonSocial")[0].innerHTML;
  var direccion = elmnt.parentElement.parentElement.getElementsByClassName("direccion")[0].innerHTML;
  var telefono = elmnt.parentElement.parentElement.getElementsByClassName("telefono")[0].innerHTML;
  var email = elmnt.parentElement.parentElement.getElementsByClassName("correo")[0].innerHTML;
  var rfc = elmnt.parentElement.parentElement.getElementsByClassName("rfc")[0].innerHTML;
  console.log(razon_social);

  document.getElementById("accion").value = "editar";

  //poner los valores de los demas atributos del sapato
  console.log(document.getElementById("accion").value);
  //document.getElementById("descripcion").value = descripcion;
  document.getElementById("empresa").value = razon_social;
  document.getElementById("direccion").value = direccion;
  document.getElementById("telefono").value = telefono;
  //document.getElementById("talla").value = tallas;
  document.getElementById("email").value = email;
  document.getElementById("rfc").value = rfc;
  
  document.getElementById("codigo").value=idp;

  console.log(document.getElementById("codigo").value);

}

function limpiarProv(){
  document.getElementById("accion").value = "";
  document.getElementById("codigo").value = "";
  //poner los valores de los demas atributos del sapato
  //document.getElementById("descripcion").value = descripcion;
  document.getElementById("empresa").value = "";
  document.getElementById("direccion").value = "";
  document.getElementById("telefono").value = "";
  document.getElementById("email").value = "";
  document.getElementById("rfc").value = "";
}

function eliminarProv(elmnt){
  var idp = elmnt.parentElement.parentElement.getElementsByClassName("id_prov")[0].innerHTML;
  var razon_social = elmnt.parentElement.parentElement.getElementsByClassName("razonSocial")[0].innerHTML;
  var direccion = elmnt.parentElement.parentElement.getElementsByClassName("direccion")[0].innerHTML;
  var telefono = elmnt.parentElement.parentElement.getElementsByClassName("telefono")[0].innerHTML;
  var email = elmnt.parentElement.parentElement.getElementsByClassName("correo")[0].innerHTML;
  var rfc = elmnt.parentElement.parentElement.getElementsByClassName("rfc")[0].innerHTML;
  console.log(razon_social);

  document.getElementById("accion").value = "borrar";

  //poner los valores de los demas atributos del sapato
  console.log(document.getElementById("accion").value);
  //document.getElementById("descripcion").value = descripcion;
  document.getElementById("empresa").value = razon_social;
  document.getElementById("direccion").value = direccion;
  document.getElementById("telefono").value = telefono;
  //document.getElementById("talla").value = tallas;
  document.getElementById("email").value = email;
  document.getElementById("rfc").value = rfc;
  
  document.getElementById("codigo").value=idp;

  console.log(document.getElementById("codigo").value);
  document.getElementById("formP").submit();
}

function comprobarTelefono(){
  var re = /(\u002B[0-9]{1,3}\u0020)?[0-9]{10,10}/;
  var telefono = document.getElementById("telefono").value;
  var botong = document.getElementById("btnguardar");
  var OK = telefono.match(re);
  console.log(OK);
  var clase = botong.className;
  clase.replaceAll("d-none","");
  var clasd = clase+" d-none";
  if(OK!=null && OK[0] === telefono){
    //botong.className=clase;
    botong.removeAttribute("disabled");
  }
  else{
    //botong.className=clasd;
    botong.setAttribute("disabled","disabled");
  }
}

function comprobarNumTel(elmnt){
  if(!vacio(elmnt)){
    comprobarTelefono();
  }
}




  $(document).ready(function(){

    
   
    var box = paginator({
      table: document.getElementById("abr").getElementsByTagName("table")[0],
      box_mode: "list",
      rows_per_page: 2
    });
    box.className = "box";
    document.getElementById("barra").appendChild(box);
    /*
    document.getElementsByClassName("box")[0].getElementsByTagName("select")[0].remove();
    document.getElementsByClassName("box")[0].getElementsByTagName("span")[0].remove();
    */
   
    /*
    const elementos = document.getElementsByClassName("box")[0].getElementsByTagName("li");
    for(let i=0;i<elementos.length;i++){
      elementos[i].className="page-item";
      elementos[i].getElementsByTagName("a")[0].className="page-link";
    }
    */
    
    
    $(".detalle").click(function(){
      alert("funciona");
    });

  });
  
