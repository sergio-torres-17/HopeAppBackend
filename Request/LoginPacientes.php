<?php
require 'Consultas.php';
$cmd = new Consultas();
$usr = $_POST['usr'];
$pwd =$_POST['pwd'];
echo $cmd->LoginPacientes($usr,$pwd);
?>