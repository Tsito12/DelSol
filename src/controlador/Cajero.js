function eliminar(elmnt){
    var idc = elmnt.parentElement.parentElement.getElementsByClassName("idc")[0].innerHTML;
    var ide = elmnt.parentElement.parentElement.getElementsByClassName("ide")[0].innerHTML;
    document.getElementById("idc").value=idc;
    document.getElementById("ide").value=ide;
    document.getElementById("frm").submit();
}