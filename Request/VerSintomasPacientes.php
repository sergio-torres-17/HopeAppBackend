<?php
header('Content-Type: text/html; charset=UTF-8');
include ('Consultas.php');
$cmd = new Consultas();
$idPaciente = $_GET['idPaciente'];
$nombrePaciente = $_GET['nombrePaciente'];
echo  $cmd->verSintomasPacientes($idPaciente, $nombrePaciente);
?>