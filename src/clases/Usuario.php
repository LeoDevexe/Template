<?php

namespace Mysql\Aplicacion\clases;

class Usuario{
    //Consultar todos los registros de usuario 

    public static function mostrarUsuarios(){
    $link = new Conexion;
    $link = $link->conectar();
    $sql = $link->query("SELECT * FROM users");
    $row = $sql->fetch_all(MYSQLI_ASSOC);

    return $row;
    
    $link->close();
}



}