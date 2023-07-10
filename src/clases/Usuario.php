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

    public static function mostrarinfoUsuario($idUsuario)
    {
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->query("SELECT * FROM users where id = $idUsuario");
        $row = $sql->fetch_all(MYSQLI_ASSOC);
        $link->close(); // Cerrar la conexión antes de devolver el resultado

        return $row;
    }

    public static function actualizarInformacion($datos){
        $id = $datos['id'];
        $mail = $datos['email'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        //var_dump($datos);
        //Comprobar email repetido
        $hayEmailRepetido = Usuario::comprobarEmail($mail);


        if(!($hayEmailRepetido)){
            $link = new Conexion;
            $link = $link->conectar();
            $sql = $link->prepare("UPDATE users set user_nombre = ?,  user_apellido = ?,  user_email = ? WHERE id = ? ");
            $sql->bind_param("sssi", $nombre, $apellido, $mail, $id);
            $sql->execute();
        }else{
            return "Ya existe ese correo electronico registrado";
        }
        
        // Status
       

        if ($sql) {
            return "ok";
        } else {

            return "error";
        }
        $link->close();
    }

    

    public static function agregarUsuarios($datos)
    {
        $mail = $datos["mail"];
        $password = $datos["pass"];
        $nombre = $datos["nombre"];
        $apellido = $datos["apellido"];
        $fecha = date("Y-m-d h:i:s");


        $hayEmailRepetido = Usuario::comprobarEmail($mail);

        if(!($hayEmailRepetido)){
            $link = new Conexion;
            $link = $link->conectar();
            $sql = $link->prepare("INSERT INTO users (user_email,user_password,user_nombre,user_apellido,fecha) VALUES (?,?,?,?,?)");
            $sql->bind_param("sssss", $mail, $password, $nombre, $apellido, $fecha);
            $sql->execute();
        }else{
            return 'El correo ya existe';
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

    public static function comprobarEmail($email)
    {
        //$mensaje;
        $link = new Conexion;
        $link = $link->conectar();

        // Consulta SQL para buscar el correo electrónico
        $sql = "SELECT * FROM users where user_email = '$email' ";
        $result = $link->query($sql);


        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

        $link->close();
    }
}
