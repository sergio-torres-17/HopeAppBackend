<?php
require 'Consultas.php';
$cmd = new Consultas();
$id_usuario = $_POST['idUsuario'];
echo $cmd->traerInfoPacienteDetallada($id_usuario);
?>