<?php
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
// Esto le dice a PHP que generaremos cadenas UTF-8
mb_http_output('UTF-8');
require ('Consultas.php');
$obj = new Consultas();
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['email'];
echo $obj->validacionExistneciaDeUsuario($nombre, $apellidos,$correo);

?>