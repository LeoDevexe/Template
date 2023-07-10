$(document).ready(init);

function init() {
  listar();
  $("#frmDatos").submit(ingresarUsuario);
  $("#frmUsuario").submit(editarUsuario);
  //$("#actualizarInfo").click(editarUsuario);
  $("#btnCancelar").click(cancelarActualizacion);
}

function listar() {
  $.post("ajax/UsuarioAjax.php?op=listar", function (resultado) {
    console.log(resultado);
    $("#tblUsuarios").append(resultado);
  });
}

function ingresarUsuario(e) {
  e.preventDefault();
  var datos = $(this).serialize();
  console.log(datos);

  $.ajax({
    url: "ajax/UsuarioAjax.php?op=ingresarUsuario",
    type: "post",
    data: datos,
    success: function (result) {
     let r = $.parseJSON(result);

      if (r.status == 1) {
        Swal.fire({
          icon: "info",
          title: "Exito...",
          text: r.msg,
        });

        
      }

      if (r.status == 0) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: r.msg,
        });
      }

      if (r.status == 2) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: r.msg,
        });
      }
      
    },
  });
}

function eliminarUsuario(idUsuario) {
  //alert(idUsuario);

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
      $.post(
        "ajax/UsuarioAjax.php?op=eliminar",
        { idUsuario: idUsuario },
        function (resultado) {
          let r = $.parseJSON(resultado);
          if (r.status == 1) {
            Swal.fire({
              icon: "success",
              title: "Exito",
              text: r.msg,
            });
          } else {
            if (r.status == 0) {
              Swal.fire({
                icon: "error",
                title: "error",
                text: r.msg,
              });
            }
          }
        }
      );
      setTimeout(() => {
        location.reload();
      }, 1500);
      //listar();
    }
  });
}


function editarUsuario(e){
   e.preventDefault();
    //cargarDatosUsuario(idUsuario);

    let datos = {
      id : $("#txtId").val(),
      nombre : $("#nombreUsuario").val(), 
      apellido: $("#apellidoUsuario").val(), 
      email : $("#emailUsuario").val()
    };
    $.post("ajax/UsuarioAjax.php?op=actualizarInformacion", {datos:datos}, function(resultado){
      let r = $.parseJSON(resultado);
      console.log(r);

      if (r.status == 2) {
        Swal.fire({
          icon: "error",
          title: "Error al actualizar",
          text: r.msg,
        });
      }

      if (r.status == 1) {
        Swal.fire({
          icon: "success",
          title: "El registro se actualizo",
          text: r.msg,
        });
      }

  });



}

function cargarDatosUsuario(idUsuario){
  $("#tablaUsuarios").hide();
  $("#frmUsuario").show();
  $(".ocultar").hide();

    $.post("ajax/UsuarioAjax.php?op=mostrarinfoUsuario",{idUsuario:idUsuario}, function(resultado){
        let r = $.parseJSON(resultado);
        console.log(r);
        $("#txtId").val(r.id);
        $("#nombreUsuario").val(r.nombre);
        $("#apellidoUsuario").val(r.apellido);
        $("#emailUsuario").val(r.email);
        
    });
}


function cancelarActualizacion(){
    location.reload();
}




