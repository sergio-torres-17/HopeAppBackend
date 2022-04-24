<?php
header('Content-Type: text/html; charset=UTF-8');
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$cmd = new Consultas();
$idPaciente = $_GET['idPaciente'];
$nombrePaciente = $_GET['nombrePaciente'];
echo  $cmd->verSintomasPacientes($idPaciente, $nombrePaciente);
?>