$('#frmClientes').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/agregarcliente.php',
            data: $(this).serialize(),
            success: function(response)
            {
                    $('#response').html(response);
           }
       });
});
    
                           
                           