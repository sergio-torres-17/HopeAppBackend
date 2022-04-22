<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$cmd = new Consultas();
$emailCedula = $_GET['email'];
echo $cmd->traerInfoPosLoginMedico($emailCedula);
?>