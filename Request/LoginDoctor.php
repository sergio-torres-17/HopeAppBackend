<?php
include ('Consultas.php');
$obj = new Consultas();
$usr = $_POST['usr'];
$pwd = $_POST['pwd'];
echo $obj->LoginDoctores($usr, $pwd);
?>