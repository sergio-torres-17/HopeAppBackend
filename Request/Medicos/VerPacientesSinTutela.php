<?php
header('Content-Type: text/html; charset=UTF-8');
include ('../../Db/Consultas.php');
$cmd = new Consultas();
echo $cmd->verPacientesSinTutela();
?>