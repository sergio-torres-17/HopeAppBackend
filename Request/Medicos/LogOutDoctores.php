<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');
$obj = new Consultas();
$usr = $_GET['UsrOrCedula'];
echo $obj->logOutDoctores($usr);
?>

?>