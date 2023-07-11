<?php
    require "../../vendor2/autoload.php";
    use Mysql\Aplicacion\clases\Usuario;


    $mail = $_POST['email'];
$hayEmailRepetido = Usuario::validarCorreo($mail);
if ($hayEmailRepetido) {
    echo "existe";
} else {
    echo "no_existe";
}

?>