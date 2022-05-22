<?php
include 'Consultas.php';
$cmd = new Consultas();
$nombre = $_POST['nom'];
$apellidos = $_POST['ape'];
$edad = $_POST['edad'];
$foto = $_POST['foto'];
echo $cmd->modificarInfo($nombre,$apellidos,$edad,$foto);
?>