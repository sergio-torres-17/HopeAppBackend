<?php
include ('Consultas.php');
$obj = new Consultas();
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['email'];
echo $obj->validacionExistneciaDeUsuario($nombre, $apellidos,$correo);
?>