function MostrarClientes(){
    f = "Eliminar";
    $.ajax({
        url: "php/ControladorClientes.php",
        method: "POST",
        data: 'funcion=MostrarClientes'
    }).done(function(respuesta) {
        var val = eval(respuesta);
       
        var html;
        html =      "<tr> <th>N°</th>  <th>Razon Social</th><th>Cuentas pendientes</th><th>Estado</th><th>Agregar anticipo</th> <th></th> </tr>";
            for(i = 0;i<val.length;i++) {
               html +="<tr><td id = 'idCli"+i+"'>"+val[i][0]+"</td> <td>"+val[i][1]+"</td><td>Sample text</td><td>Sample text</td><td>Sample text</td><td><button class='btnmod'><img src='img/editar.png'></button><button Onclick='EliminarCliente("+val[i][0]+")' class='btneliminar'><img src='img/eliminar.png'> </button></tr>";
            }
        $("#tbl").html(html);
    });
}
function EliminarCliente(idcli){
    $.ajax({
        url:"php/ControladorClientes.php",
        method:"POST",
        data: "funcion=Eliminar"+"&id="+idcli,
        success:function(response){
            alert(response);
            location.href="clientes.html";
        }
    });
   
}
