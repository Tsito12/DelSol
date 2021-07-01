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