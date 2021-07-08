$(document).ready(function(){
    /*
    $("#btnEditar").click(function(){
        $.post("../vista/EditarU.php",
        {
            id: "basura"
        },
        function(){

        });
    });
    */
});

function editar(elmnt){
    var ide = elmnt.parentElement.parentElement.getElementsByClassName("ide")[0].innerHTML;
    /*
    $.post("../vista/EditarU.php",
        {
            id: ide
        },
        function(data, statuts, xhr){
            var parser = new DOMParser();
            var doc = parser.parseFromString(data, 'text/html');
            console.log(doc);
            //location.replace("../vista/EditarU.php");
        });
        */
    var form = document.createElement("form");
    form.setAttribute("id","fr");
    form.setAttribute("action","../vista/EditarU.php");
    form.setAttribute("method","POST");
    var input = document.createElement("input");
    input.setAttribute("name","id");
    input.value=ide;
    input.setAttribute("class","d-none");
    form.appendChild(input);
    document.getElementById("cont").appendChild(form);
    document.getElementById("fr").submit();

}

function eliminar(elmnt){
    var ide = elmnt.parentElement.parentElement.getElementsByClassName("ide")[0].innerHTML;
    /*
    $.post("../vista/EditarU.php",
        {
            id: ide
        },
        function(data, statuts, xhr){
            var parser = new DOMParser();
            var doc = parser.parseFromString(data, 'text/html');
            console.log(doc);
            //location.replace("../vista/EditarU.php");
        });
        */
    var form = document.createElement("form");
    form.setAttribute("id","frE");
    form.setAttribute("action","../vista/Usuario-administrador.php");
    form.setAttribute("method","POST");
    var input = document.createElement("input");
    input.setAttribute("name","id");
    input.value=ide;
    input.setAttribute("class","d-none");
    form.appendChild(input);
    document.getElementById("cont").appendChild(form);
    document.getElementById("frE").submit();

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