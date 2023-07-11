<?php
require "../../vendor2/autoload.php";

use Mysql\Aplicacion\clases\login;

$datos=[
    'email' => $_POST['email'],
    'password' => $_POST['password'],
];
$respuesta  = login::validarLogin($datos);
echo $respuesta;
?>