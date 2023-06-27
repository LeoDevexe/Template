<?php
namespace Mysql\Aplicacion\clases ;

use mysqli;

class Conexion {

    private $host ="localhost";
    private $user = "root";
    private $pass = "";
    private $db = "prueba_mysqli";


    public function conectar (){
        $mysqli = new mysqli($this->host, $this->user, $this->pass , $this->db);
        if($mysqli->connect_errno){
            die("Error Connection :".$mysqli->connect_errno);
        }
        return $mysqli;
    }

}