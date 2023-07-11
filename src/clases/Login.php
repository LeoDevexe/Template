<?php
    namespace Mysql\Aplicacion\clases;
    
    use Mysql\Aplicacion\clases\Conexion;


class login{
public static function validarLogin($datos){
        // Establecer conexión
        $link = new Conexion;
        $link = $link->conectar();
        $sql = $link->prepare("SELECT * FROM users WHERE user_email = ? AND user_password = ?");
        $sql->bind_param("ss", $datos['email'],$datos['password']);
        $sql->execute();
        $row = $sql->get_result()->fetch_assoc();

        if (!is_null($row)) {
            session_start();
            $_SESSION['estado'] = "ok";
            $_SESSION['nombre'] = $row['user_nombre'];
            $_SESSION['apellido'] = $row['user_apellido'];
            return "ok";
        }else{
            return "error";
        }
        $link->close();
    }
}
?>