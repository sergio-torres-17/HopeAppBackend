<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$obj = new Consultas();
$usr = $_GET['usr'];
$pwd = $_GET['pwd'];
echo $obj->LoginDoctores($usr, $pwd);
?>