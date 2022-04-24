<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$cmd = new Consultas();
$idPaciente = $_GET['idPaciente'];
$nombrePaciente = $_GET['nombrePaciente'];
$fechaInicio = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];
echo $cmd->verSintomasPacientesPorRangoFecha($idPaciente, $nombrePaciente, $fechaInicio, $fechaFin);
?>