<?php
include ('../../Db/Consultas.php');
$cmd = new Consultas();
echo $cmd->traerTiposCancer();
?>