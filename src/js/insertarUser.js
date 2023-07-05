$("#frmDatos").submit(function (e) {
  e.preventDefault();
  var datos = $(this).serialize();
  console.log(datos);

  $.ajax({
    url: "ajax/insertarUser.php",
    type: "post",
    data: datos,
    success: function (result) {
      console.log(result);
      if (result != "ok" || result != "error") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: 'Ya existe ese email',
        });
      }
      if (result == "ok") {
        Swal.fire({
          icon: "info",
          title: "Exito...",
          text: "Se inserto el registro correctamente",
        });
      }

      if (result == "error") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No se inserto el email",
        });
      }

    },
  });
});
