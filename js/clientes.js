function MostrarClientes(){
    f = "Eliminar";
    $.ajax({
        url: "../php/ControladorClientes.php",
        method: "POST",
        data: 'funcion=MostrarClientes'
    }).done(function(respuesta) {
        var val = eval(respuesta);
       
        var html;
        html =      "<tr> <th>N°</th>  <th>Razon Social</th><th>Cuentas pendientes</th><th>Estado</th><th>Agregar anticipo</th> <th></th> </tr>";
            for(i = 0;i<val.length;i++) {
               html +="<tr><td id = 'idCli"+i+"'>"+(i+1)+"</td> <td>"+val[i][1]+"</td><td>Sample text</td><td>Sample text</td><td>Sample text</td><td><button onclick ='RedirigirAMod("+val[i][0]+")' class='btnmod'><img src='../img/editar.png'></button><button Onclick='EliminarCliente("+val[i][0]+")' class='btneliminar'><img src='../img/eliminar.png'> </button></tr>";
            }
        $("#tbl").html(html);
    });
}
function EliminarCliente(idcli){
    $.ajax({
        url:"../php/ControladorClientes.php",
        method:"POST",
        data: "funcion=Eliminar"+"&id="+idcli,
        success:function(response){
            alert(response);
            location.href="clientes.html";
        }
    });
   
}
function RedirigirAMod(id){
    location.href = "modificarcliente.html?id="+id;
}
function BuscarCliente(){
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('id');
     $.ajax({
        url:"../php/ControladorClientes.php",
        method:"POST",
        data:'funcion=BuscarCliente&id='+myParam,
        success:function(response){
            var val = eval(response);
            for(i = 0;i<val.length;i++) {
                $("#id").val(val[i][0]);
                $("#razonsocial").val(val[i][1]);
                $("#calle").val(val[i][2]);
                $("#numint").val(val[i][3]);
                $("#numext").val(val[i][4]);
                $("#colonia").val(val[i][5]);   
                $("#cp").val(val[i][6]);
                $("#ciudad").val(val[i][8]);
                $("#telefono").val(val[i][9]);
                $("#ruta").val(val[i][10]);
                $("#verruta").val(val[i][10]);
                $("#ncuenta").val(val[i][11]);
                $("#correo").val(val[i][12]);
                $("#taxid").val(val[i][13]);
                $("#segurosocial").val(val[i][14]);
                
            }
        }
    });
}
function ModificarCliente(){
$("#frmClientes").submit(function(e){
    e.preventDefault();
    $.ajax({ 
            type: "POST",
            url: '../php/ControladorClientes.php',
            data: $("#frmClientes").serialize(),
            success: function(response)
            {
                $("#response").html(response); 
            }
       });    
});
   
}