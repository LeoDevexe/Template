
  $("#frmDatos").submit(function (e) {
    e.preventDefault();
    var datos = $(this).serialize();
    console.log(datos);

    $.ajax({
      url: "ajax/login.php",
      type: "post",
      data: datos,
      success: function (result) {
        console.log(result);
        if (result == "ok") {
          location.href = "../index.php";
          console.log("YA ESTAMOS")
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Error, credenciales incorrectas",
          });
        }
      },
    });
  });
