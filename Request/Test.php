<?php
require 'Conexion.php';
require 'MultiTool.php';
$con = new Conexion();
$cmd = $con->GetConnection()->prepare("select * from usuarios");
$cmd->execute();
$lector = $cmd->fetchAll();
$multiTool = new MultiTool();

if($lector){
    for($i = 0; $i<sizeof($lector);$i++){
        $arr = $lector[$i];
        $arrImgagenesBin = $multiTool->formarArraysImagenesBin($arr['ruta_foto'],'fotoBinEntera');
        $lector[$i] = array_merge($arr,$arrImgagenesBin);
    }
}
echo json_encode($lector);


/*$imagen = base64_encode(file_get_contents('/home/u306142809/domains/multicodemx.com/public_html/hopeapp/DEV/Request/Archivos/CA_MarcoArgote/Fotos/FP_MarcoArgote.png'));
echo $imagen;*/

?>