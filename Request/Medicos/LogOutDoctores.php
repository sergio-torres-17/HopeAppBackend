<?php
include ('../../Db/Consultas.php');
$obj = new Consultas();
$usr = $_GET['UsrOrCedula'];
echo $obj->logOutDoctores($usr);
?>

?>