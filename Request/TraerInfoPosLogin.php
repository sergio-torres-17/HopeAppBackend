<?php
include ('Consultas.php');
$cmd = new Consultas();
$emailCedula = $_POST['email'];
echo $cmd->traerInfoPosLoginMedico($emailCedula);
?>