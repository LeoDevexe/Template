$("#frmDatos").submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    console.log(datos);
  
    $.ajax({
      url: "ajax/validarCorreo.php",
      type: "post",
      data: datos,
      success: function (result) {
        console.log(result);
        if (result != "ok" || result != "error") {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: 'Este Email ya está registrado',
          });
    }else{
        if (result == "error") {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se inserto el registro correctamente",
          });
        }
    }
      },
    });
  });