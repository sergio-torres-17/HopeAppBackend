<?php
include ('../../Db/Consultas.php');
$cmd = new Consultas();
$emailCedula = $_GET['email'];
echo $cmd->traerInfoPosLoginMedico($emailCedula);
?>