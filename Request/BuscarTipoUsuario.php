<?php
header('Content-Type: text/html; charset=UTF-8');
include ('Consultas.php');
$cmd = new Consultas();
$correo = $_GET['correo'];
echo $cmd->buscarTipoUsuarios($correo);
?>