<?php
require "../../vendor2/autoload.php";
use Mysql\Aplicacion\clases\Usuario;

$datos = [
'nombre' => $_POST ['nombre'],
'apellido' => $_POST ['apellido'],
'id' => $_POST['id'],
];
$respuesta = Usuario::actualizarUsuarios($datos);
echo $respuesta;
?>