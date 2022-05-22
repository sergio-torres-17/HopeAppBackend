<?php
require 'Consultas.php';
$cmd = new Consultas();
$usr = $_POST['usr'];
echo $cmd->verTipoUsuario($usr);
?>