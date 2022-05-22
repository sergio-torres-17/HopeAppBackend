<?php
include ('Consultas.php');
$cmd = new Consultas();
$sintoma = $_POST['sintoma'];
$fecha = $_POST['fecha'];
$hora  = $_POST['hora'];
$idPaciente = $_POST['idPaciente'];
$intensidad = $_POST['intensidad'];
$detalles = $_POST['detalles'];
echo $cmd->insertarSintoma($sintoma,$fecha,$hora,$idPaciente,$intensidad,$detalles);
?>