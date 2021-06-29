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