function editar(elmnt){
    var idc = elmnt.parentElement.parentElement.getElementsByClassName("idc")[0].innerHTML;
    document.getElementById("idc").value=idc;
    document.getElementById("frm").submit();
}