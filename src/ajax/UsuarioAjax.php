
<?php
require "../../vendor2/autoload.php";

use Mysql\Aplicacion\clases\Usuario;

$objetoUsuario = new Usuario();
$op = $_GET['op'];

switch ($op) {

    case 'listar':
        $users = Usuario::mostrarUsuarios();

        foreach ($users as $key => $user) :
            echo '<tr>
                <td>' .  $user["user_nombre"] . '</td>
                <td>' . $user["user_apellido"] . '</td>
                <td>' . $user["user_email"] . '</td>
                <td>' . $user["fecha"] . '</td>
                <td>
                    <button class="btn btn-primary"  onclick="cargarDatosUsuario(' . $user['id'] . ')">Editar</button>
                    <button class="btn btn-secondary  btnEliminar" id="eliminarUsuario" onclick="eliminarUsuario(' . $user['id'] . ')">Eliminar</button>
                </td>
                </tr>';
        endforeach;

        break;

    case 'eliminar':
        $idUsuario = $_POST['idUsuario'];
        $mensaje = Usuario::eliminarUsuarios($idUsuario);
        if ($mensaje == "ok") {
            $resultado = array("status" => 1, "msg" => "El registro se ha eliminado correctamente");
            echo json_encode($resultado);
        }

        if ($mensaje == "error") {
            $resultado = array("status" => 0, "msg" => "El registro no se ha eliminado");
            echo json_encode($resultado);
        }

        break;

    case 'mostrarinfoUsuario':
        //Recibir array y convertirlo a json
        $idUsuario = $_POST['idUsuario'];
        $users = Usuario::mostrarinfoUsuario($idUsuario);
        $arrayUsuario = [];

        foreach ($users as $key => $user) :
            $arrayUsuario = ["id" => $user['id'], "nombre" => $user['user_nombre'], "apellido" => $user['user_apellido'], "email" => $user["user_email"]];
        endforeach;

        echo json_encode($arrayUsuario);

        break;

    case 'actualizarInformacion':
        $datos = $_POST['datos'];
        $datosUsuario = json_encode($datos);

        $respuesta = Usuario::actualizarInformacion($datos);



        if ($respuesta == "ok") {
            $resultado = array("status" => 1, "msg" => "El registro se actualizo");
            echo json_encode($resultado);
        }

        if ($respuesta == "error") {
            $resultado = array("status" => 0, "msg" => "El registro no se ha actualizado");
            echo json_encode($resultado);
        }

        if ($respuesta == "Ya existe ese correo electronico registrado") {
            $resultado = array("status" => 2, "msg" => "Ya existe ese correo");
            echo json_encode($resultado);
        }

        break;

    case 'ingresarUsuario':
        $datos = [
            'mail' => $_POST["email"],
            'pass' =>  $_POST["password"],
            'nombre' => $_POST["nombre"],
            'apellido' => $_POST["apellido"],
        ];
        $respuesta =  Usuario::agregarUsuarios($datos);
        
        if ($respuesta == "ok") {
            $resultado = array("status" => 1, "msg" => "El registro se actualizo");
            echo json_encode($resultado);
        }

        if ($respuesta == "error") {
            $resultado = array("status" => 0, "msg" => "El registro no se ha actualizado");
            echo json_encode($resultado);
        }

        if ($respuesta == "Ya existe ese correo electronico registrado") {
            $resultado = array("status" => 2, "msg" => "Ya existe ese correo");
            echo json_encode($resultado);
        }

        break;
}

?>

            
                            
              