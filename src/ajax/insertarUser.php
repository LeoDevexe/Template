<?php
    require "../../vendor2/autoload.php";
    use Mysql\Aplicacion\clases\Usuario;



$datos =[
'email' => $_POST["email"],
'pass' =>  $_POST["password"],
'nombre'=> $_POST["nombre"],
'apellido' => $_POST["apellido"],
];

$respuesta =  Usuario::agregarUsuarios($datos);

echo $respuesta;

?>