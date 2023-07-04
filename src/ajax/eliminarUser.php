<?php
    require "../../vendor2/autoload.php";
    use Mysql\Aplicacion\clases\Usuario;


$id = $_POST["id"];

$respuesta =  Usuario::eliminarUsuarios($id);

echo $respuesta;
?>