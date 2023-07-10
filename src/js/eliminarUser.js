/* ELIMNAR REGISTRO */
$(".tablas").on("click", ".btnEliminar", function () {
    var id = $(this).attr("idUsuario");
    console.log(id);
    Swal.fire({
      title: "Estas seguro?",
      text: "Vas a eliminar un registro!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, borrar!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "ajax/eliminarUser.php",
          type: "post",
          data: { id: id },
          success: function (result) {
            console.log(result);
            if (result == "ok") {
              Swal.fire(
                "Ok",
                "El registro se elimino correctamente",
                "success"
              ).then((result) => {
                location.reload();
              });
            } else {
              Swal.fire("The Internet?", "El registro no se elimino", "question");
            }
          },
        });
      }
    });
  });
  