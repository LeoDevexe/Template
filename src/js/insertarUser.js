$('#frmDatos').submit(function(e) {
  e.preventDefault();

  // Obtener los valores de los campos del formulario
  var nombre = $('#exampleFirstName').val().trim();
  var apellido = $('#exampleLastName').val().trim();
  var email = $('#exampleInputEmail').val().trim();
  var password = $('#exampleInputPassword').val().trim();
  var repeatPassword = $('#exampleRepeatPassword').val().trim();

  // Validar campos vacíos
  if (nombre === '' || apellido === '' || email === '' || password === '' || repeatPassword === '') {
    Swal.fire({
      icon: 'error',
      title: 'Campos vacíos',
      text: 'Por favor, completa todos los campos del formulario.'
    });
    return; 
  }

  var datos = $(this).serialize();
  $.ajax({
    url: "ajax/validarCorreo.php",
    type: "post",
    data: datos,
    success: function(result) {
      console.log(result);
      if (result == "existe") {
        Swal.fire({
          icon: 'error',
          title: 'Email ya existente',
          text: 'El correo electrónico ya está registrado en la base de datos.'
        });
      } else {
        $.ajax({
          url: "ajax/insertarUser.php",
          type: "post",
          data: datos,
          success: function(result) {
            console.log(result);
            if (result == "ok") {
              Swal.fire({
                icon: 'info',
                title: 'Éxito...',
                text: 'Se insertó el registro correctamente'
              });
              $('#exampleFirstName').val('');
              $('#exampleLastName').val('');
              $('#exampleInputEmail').val('');
              $('#exampleInputPassword').val('');
              $('#exampleRepeatPassword').val('');
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error, no se insertó el registro'
              });
            }
          }
        });
      }
    }
  });
});
