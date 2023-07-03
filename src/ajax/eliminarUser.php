<?php
   require "../../vendor2/autoload.php";
    use Mysql\Aplicacion\clases\Usuario;



$datos =[
'id' => $_POST["id"],
];

$respuesta =  Usuario::eliminarUsuarios($datos);

echo $respuesta;
?>