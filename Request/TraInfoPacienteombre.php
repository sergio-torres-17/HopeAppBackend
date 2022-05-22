<?php
require 'Consultas.php';
$cmd = new Consultas();
$nombrePaciente= $_POST['nombrePaciente'];
echo $cmd->traerInfoPacienteDetalladaPorNombre($nombrePaciente);
?>