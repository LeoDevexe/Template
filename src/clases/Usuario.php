<?php

namespace Mysql\Aplicacion\clases;

class Usuario
{
    // Consultar todos los registros de usuario 
    public static function mostrarUsuarios()
    {
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->query("SELECT * FROM users");
        $row = $sql->fetch_all(MYSQLI_ASSOC);
        $link->close(); // Cerrar la conexión antes de devolver el resultado

        return $row;
    }

    public static function agregarUsuarios($datos)
{
    $mail = $datos["email"]; // Corregir la clave "mail" a "email"
    $password = $datos["pass"];
    $nombre = $datos["nombre"];
    $apellido = $datos["apellido"];
    $fecha = date("Y-m-d h:i:s");

    // Comprobar email repetido
    $hayEmailRepetido = Usuario::validarCorreo($mail);

    if (!$hayEmailRepetido) {
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->prepare("INSERT INTO users (user_email, user_password, user_nombre, user_apellido, fecha) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $mail, $password, $nombre, $apellido, $fecha);
        $sql->execute();
    } else {
        return 'Ya existe ese correo electrónico registrado';
    }

    // Status
    if ($sql) {
        return "ok";
    } else {
        return "error";
    }
    $link->close();
}


    public static function eliminarUsuarios($id)
    {
        // Establecer conexión
        $link = new Conexion;
        $link = $link->conectar();

        // Preparar y ejecutar la consulta
        $sql = $link->prepare("DELETE FROM users WHERE id = ?");
        $sql->bind_param("i", $id);

        if ($sql->execute()) {
            return "ok";
        } else {

            return "error";
        }
        $link->close();
    }


    //EDITAR REGISTRO
    public static function editarUsuarios($id)
    {
        $link = new Conexion;
        $link = $link->conectar();

        // Preparar y ejecutar la consulta
        $sql = $link->prepare("SELECT * FROM users WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $row = $sql->get_result()->fetch_assoc();
        return $row;
        $link->close();
    }


    public static function actualizarUsuarios($datos)
    {
        $link = new Conexion;
        $link = $link->conectar();

        $sql = $link->prepare("UPDATE users SET user_nombre =?, user_apellido= ? WHERE id = ?");
        $sql->bind_param("ssi", $datos['nombre'], $datos['apellido'], $datos['id']);
        if ($sql->execute()) {
            return "ok";
        } else {

            return "error";
        }
        $link->close();
    }
    public static function validarCorreo($mail)
    {
        $link = new Conexion;
        $link = $link->conectar();

        $sql = "SELECT * FROM users where user_email = '$mail' ";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            return "existe";
        } else {
            return false;
        }

        $link->close();
    }
}
