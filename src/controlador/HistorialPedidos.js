


$(document).ready(function(){
    var box = paginator({
        table: document.getElementById("abr").getElementsByTagName("table")[0],
        box_mode: "list",
        rows_per_page: 2
      });
      box.className = "box";
      document.getElementById("barra").appendChild(box);
});