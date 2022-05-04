<?php
include ('MultiTool.php');
include ('Archivos.php');
include ('Consultas.php');

$nombre= $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$tipo_cancer = $_POST['tipocancer'];
$etapa = $_POST['etapa'];
//$fotoPerfilBin = $_POST['fotoPerfil'];
//$fotoExpedienteBin = $_POST['fotoExpediente'];
$multiToolAux = new MultiTool();
$archivos = new ControArchivos();
$rutaBaseArchivos = $_SERVER['DOCUMENT_ROOT'].'/img/';

$nombreCarpetaArchivos = $rutaBaseArchivos .  $multiToolAux->GenerarNombreCarpetaUsuario($nombre, $apellidos). '/';
$archivos->CrearDirectorio($nombreCarpetaArchivos);
$archivos->CrearDirectorio($nombreCarpetaArchivos.'Fotos/');
$nombreFotoPerfil = $multiToolAux->GenerarNombreArchivoFotoPerfil($nombre,$apellidos);
$nombreExpediente = $multiToolAux->generarNombreExpediente($nombre,$apellidos);
$rutaFotoPerfil = $nombreCarpetaArchivos.'Fotos/' . $nombreFotoPerfil;
$rutaExpediente = $nombreCarpetaArchivos.'Fotos/' . $nombreExpediente;
//Guardado de imagenes
//file_put_contents($rutaFotoPerfil, base64_decode($fotoPerfilBin));//Guardado de imagen de perfil
//$archivoByte = file_get_contents($rutaFotoPerfil);
$cmd = new Consultas();
$cmd->insertarPaciente($nombre,$apellidos,$edad,$email,$pass,$tipo_cancer,$etapa, $rutaExpediente,$rutaFotoPerfil);
?>