<?php
    require "../../vendor2/autoload.php";
    use Mysql\Aplicacion\clases\Usuario;



$hayEmailRepetido = Usuario::validarCorreo($mail);