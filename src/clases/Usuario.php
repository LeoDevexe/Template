<?php

namespace Mysql\Aplicacion\clases;

class Usuario {
    // Consultar todos los registros de usuario 
    public static function mostrarUsuarios() {
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->query("SELECT * FROM users");
        $row = $sql->fetch_all(MYSQLI_ASSOC);
        $link->close(); // Cerrar la conexión antes de devolver el resultado

        return $row;
    }

    public static function agregarUsuarios($datos) {
        $mail = $datos["mail"];
        $password = $datos["pass"];
        $nombre = $datos["nombre"];
        $apellido = $datos["apellido"];
        $fecha = date("Y-m-d h:i:s");
        // Status
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->prepare("INSERT INTO users (user_email,user_password,user_nombre,user_apellido,fecha) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssss", $mail, $password, $nombre, $apellido, $fecha);
        $sql->execute();

        if ($sql) {
            return "ok";
        } else {
            
            return "error";
        }
        $link->close();
    }

    public static function eliminarUsuarios($id) {
        // Establecer conexión
        $link = new Conexion;
        $link = $link->conectar();
    
        // Preparar y ejecutar la consulta
        $sql = $link->prepare("DELETE FROM users WHERE id = ?");
        $sql->bind_param("i", $id);
       
        if ( $sql->execute()) {
            return "ok";
        } else {
            
            return "error";
        }
        $link->close();
    }
}