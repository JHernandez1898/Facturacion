function MostrarProductos(){
    $.ajax({
        url: "../php/ControladorProductos.php",
        method: "POST",
        data: 'funcion=MostrarProductos'
    }).done(function(respuesta) {
        var val = eval(respuesta);
       
        var html;
        html =      "<tr><th>N°</th><th>Código</th><th>Descripción</th><th>Tipo</th><th>Precio</th><th>Cantidad</th><th></th> </tr>";
            for(i = 0;i<val.length;i++) {
               html +="<tr><td id = 'idCli"+i+"'>"+(i+1)+"</td> <td>"+val[i][1]+"</td><td>"+val[i][2]+"</td><td>"+val[i][3]+"</td><td>"+val[i][4]+"</td><td>"+val[i][5]+"</td><td><button onclick ='RedirigirModificar("+val[i][0]+")' class='btnmod'><img src='../img/editar.png'></button><button Onclick='EliminarProducto("+val[i][0]+")' class='btneliminar'><img src='../img/eliminar.png'> </button></tr>";
            }
        $("#tbl").html(html);
    });
}
function AparecerCantidad(){
        valor = $("#tipo").val();
        if(valor=="Producto"){
            $("#cantidad").html("Cantidad: <input type='text' class= 'txtbx' id='cant' name='cant'><br>");
        }else{
            $("#cantidad").html("");
        }
}
function EliminarProducto(idProducto){
    $.ajax({
        url: "../php/ControladorProductos.php",
        method: "POST",
        data: 'funcion=EliminarProducto&id='+idProducto
    }).done(function(respuesta) {
       alert(respuesta);
        location.href = "inventario.html";
    });
}
function RedirigirModificar(idProducto){
    location.href= "modificarproducto.html?id=" +idProducto;
}
function BuscarProducto(){
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('id');
     $.ajax({
        url:"../php/ControladorProductos.php",
        method:"POST",
        data:'funcion=BuscarProducto&id='+myParam,
        success:function(response){
            var val = eval(response);
            for(i = 0;i<val.length;i++) {
                $("#idS").val(val[i][0]);
                $("#codigo").val(val[i][1]);
                $("#descripcion").val(val[i][2]);
                $("#tipo").val(val[i][3]);
                $("#precio").val(val[i][4]);
                $("#cantidad").val(val[i][5]);   
            }
        }
    });
}

function ModificarProducto(){
    $("#frmProducto").submit(function(e){
    e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../php/ControladorProductos.php',
            data:  $("#frmProducto").serialize(),
            success: function(response)
            {
                alert(response);
                $("#response").html(response);   
            }
       });
});
}