<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$obj = new Consultas();
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['email'];
echo $obj->validacionExistneciaDeUsuario($nombre, $apellidos,$correo);
?>