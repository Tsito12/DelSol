function eliminar(elmnt){
    var idc = elmnt.parentElement.parentElement.getElementsByClassName("idc")[0].innerHTML;
    var ide = elmnt.parentElement.parentElement.getElementsByClassName("ide")[0].innerHTML;
    document.getElementById("idc").value=idc;
    document.getElementById("ide").value=ide;
    document.getElementById("frm").submit();
}

function buscarTabla(){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("buscar");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
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