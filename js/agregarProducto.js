 $("#frmProducto").submit(function(e){
    e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../php/ControladorProductos.php',
            data:  $("#frmProducto").serialize(),
            success: function(response)
            {
                $("#response").html(response);   
                location.href = "inventario.html";
            }
       });
});