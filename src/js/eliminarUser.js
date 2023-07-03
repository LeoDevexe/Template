$(".tablas").on("click", ".btnEliminar", function(){
    var id = $(this).attr("id");
    console.log(id);
    swal.fire({
        title: '¿Estás seguro?',
        text: 'Vas a eliminar un registro!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar!'
    }).then(function(result) {
        if (result.isConfirmed) {
            $.ajax({
                url: 'ajax/eliminarUser.php',
                data: {"id": id},
                success: function(result) {
                    console.log(result);
                    if (result == "ok") {
                        Swal.fire(
                            'Éxito',
                            'El registro se eliminó correctamente',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Error',
                            'El registro no se eliminó',
                            'error'
                        );
                    }
                }
            });
        }
    });
});