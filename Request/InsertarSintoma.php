<?php
include ('Consultas.php');
$cmd = new Consultas();
$sintoma = $_GET['sintoma'];
$fecha = $_GET['fecha'];
$hora  = $_GET['hora'];
$idPaciente = $_GET['idPaciente'];
$intensidad = $_GET['intensidad'];
$detalles = $_GET['detalles'];
echo $cmd->insertarSintoma($sintoma,$fecha,$hora,$idPaciente,$intensidad,$detalles);
?>