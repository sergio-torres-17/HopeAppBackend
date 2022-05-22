<?php
require 'Consultas.php';
$cmd = new Consultas();
$idPaciente = $_POST['idPaciente'];
echo $cmd->buscarIDDoctorACargo($idPaciente);
?>