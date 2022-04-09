<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$obj = new Consultas();
$usr = $_POST['usr'];
$pwd = $_POST['pwd'];
echo $obj->LoginDoctores($usr, $pwd);
?>