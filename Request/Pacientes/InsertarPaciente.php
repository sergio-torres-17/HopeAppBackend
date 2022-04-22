<?php
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/request/multiusos/MultiTool.php');
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/request/multiusos/Archivos.php');
include ($_SERVER['DOCUMENT_ROOT'].'/HopeAppBackend/Db/Consultas.php');

$nombres = $_GET['nombres'];
$apellidos = $_GET['apellidos'];
$edad = $_GET['edad'];
$email = $_GET['email'];
$pass = $_GET['pass'];
$tipo_cancer = $_GET['tipocancer'];
$etapa = $_GET['etapa'];
$fotoPerfilBin = $_GET['fotoPerfil'];
//$fotoExpedienteBin = $_GET['fotoExpediente'];

$nombreCarpetaArchivos = $rutaBaseArchivos .  $multiToolAux->GenerarNombreCarpetaUsuario($nombre, $apellidos). '/';
$archivos->CrearDirectorio($nombreCarpetaArchivos);
$archivos->CrearDirectorio($nombreCarpetaArchivos.'Fotos/');
$nombreFotoPerfil = $multiToolAux->GenerarNombreArchivoFotoPerfil($nombre,$apellidos);
$nombreExpediente = $multiToolAux->generarNombreExpediente($nombre,$apellidos);
$rutaFotoPerfil = $nombreCarpetaArchivos.'Fotos/' . $nombreFotoPerfil;
$rutaExpediente = $nombreCarpetaArchivos.'Fotos/' . $nombreExpediente;
//Guardado de imagenes
file_put_contents($rutaFotoPerfil, base64_decode($fotoPerfilBin));//Guardado de imagen de perfil
$archivoByte = file_get_contents($rutaFotoPerfil);
$cmd = new Consultas();
$cmd->insertarPaciente($nombre,$apellidos,$edad,$email,$pass,$tipo_cancer,$etapa, $rutaExpediente,$rutaFotoPerfil);
?>