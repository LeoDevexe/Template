$('#frmDatos').submit(function(e){
    e.preventDefault();
    var datos = $(this).serialize();
    console.log(datos);

    $.ajax({
        url:"ajax/insertarUser.php",
        type: "post",
        data: datos,
        success: function(result)
        {
            console.log(result);
            if (result =="ok") {
                Swal.fire({
                    icon: 'info',
                    title: 'Exito...',
                    text: 'Se inserto el registro correctamente'
                    
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error, no se inserto el registro!'
                    
                  })
            }
        }
    })

})