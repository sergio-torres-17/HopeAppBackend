<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$cmd = new Consultas();
$estatus = $_GET['stat'];
$idDoctor = $_GET['IdDoctor'];;
$idUsuario = $_GET['idUsuario'];
echo $cmd->modificarEstatusConexionDoctor($idDoctor, $estatus, $idUsuario);
?>