<?php
header('Content-Type: text/html; charset=UTF-8');
require ('Consultas.php');
$cmd = new Consultas();
echo $cmd->verPacientesSinTutela();
?>