<?php
include 'Conexion.php';
$con = new Conexion();
echo $con->GetConnection()->getAttribute(PDO::ATTR_CONNECTION_STATUS)

?>