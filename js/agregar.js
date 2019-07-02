$("#frmClientes").submit(function(e){
    e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../php/ControladorClientes.php',
            data:  $("#frmClientes").serialize(),
            success: function(response)
            {
                $("#response").html(response);                 
            }
       });
});