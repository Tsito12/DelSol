function res()
     {

        var number1 = document.getElementById('precioP').value;
        var number2 = document.getElementById('abono').value;
        

        if (number1 == '') {
           number1 = 0
           var num3 = parseFloat(number1) - parseFloat(number2);
           document.getElementById('result').value = num3;
           

        }
        else if(number2 == '')
        {
           number2 = 0;
           var num3 = parseFloat(number1) - parseFloat(number2);
           document.getElementById('result').value = num3;
           
        }
        else
        {
           var num3 = parseFloat(number1) + parseFloat(number2);
            var num3 = parseFloat(number1) - parseFloat(number2);
           document.getElementById('result').value = num3;
        }

     }

     function ponerPrecioSapato(elmnt){
       var select = document.getElementById("idz");
       var options = select.getElementsByTagName("option");
       options[0].remove();
       var i = 0;
       var precio=0;
       //var encontrado = false;
       while(i<options.length){
           
           if(options[i].selected){
                var contenido = options[i].innerText;
                contenido = contenido.split(" -- ");
                precio = contenido[2];
                precio = precio.replace("$","");
                console.log(precio);
                break;
           }
           i++;
       }
       document.getElementById("precioP").value=precio;
     }