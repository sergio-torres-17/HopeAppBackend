<?php
include ('Consultas.php');
$cmd = new Consultas();
$nombreDoctor = $_POST['nombreDoctor'];
$nombrePaciente = $_POST['nombrePaciente'];
$fechaHora = $_POST['fechaHora'];
echo $cmd->InsertarTutelaSobrePaciente($nombreDoctor,$nombrePaciente,$fechaHora);
?>