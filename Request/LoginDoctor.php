<?php
include ('Consultas.php');
$obj = new Consultas();
$usr = $_GET['usr'];
$pwd = $_GET['pwd'];
echo $obj->LoginDoctores($usr, $pwd);
?>