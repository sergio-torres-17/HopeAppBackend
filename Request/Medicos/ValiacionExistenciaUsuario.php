<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$obj = new Consultas();
$nombre = $_GET['nombre'];
$apellidos = $_GET['apellidos'];
$correo = $_GET['correo'];
echo $obj->validacionExistneciaDeUsuario($nombre, $apellidos,$correo);
?>